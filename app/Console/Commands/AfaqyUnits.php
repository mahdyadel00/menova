<?php

namespace App\Console\Commands;

use App\Models\Truck;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class AfaqyUnits extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'afaqy:units';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get units listed in afaqy through api';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $token = $this->getAfaqyToken();
        $units = $this->listUnits($token);
        $this->updateTruckData($units);

    }//end of handle

    private function getAfaqyToken()
    {
        $response = Http::post('http://api.afaqy.sa/auth/login', [
            'data' => [
                'username' => 'modn-almanar',
                'password' => '0oiMpjiBC',
            ]
        ]);

        $token = $response->json()['data']['token'];
        return $token;

    }// end of getAfaqyToken

    private function listUnits($token)
    {
        $response = Http::post('https://api.afaqy.sa/units/lists?token=' . $token, [
            'data' => [
                'projection' => ['basic', 'groups', 'last_update', 'sensors', 'counters'],
                'limit' => 1000
            ]
        ]);

        return $response->json()['data'];

    }// end of listUnits

    private function updateTruckData($units)
    {
        foreach ($units as $unit) {

            $truck = Truck::where('p_number', $unit['profile']['plate_number'])->first();

            if ($truck) {
                $truck->update([
                    'lat' => $unit['last_update']['lat'],
                    'lng' => $unit['last_update']['lng'],
                    't_kilometers' => $unit['counters']['odometer']
                ]);

            }//end of if 
            
        }//end of for each

    }// end of updateTruckData

}//end of command
