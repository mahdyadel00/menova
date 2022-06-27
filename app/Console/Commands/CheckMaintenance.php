<?php

namespace App\Console\Commands;

use App\Models\Truck;
use App\Notifications\TruckMaintenance;
use Illuminate\Console\Command;

class CheckMaintenance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:maintenance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checking the truck maintenance and send a notification and an email to provider';

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
        Truck::chunk(500, function ($trucks) {

            foreach ($trucks as $truck) {

                if ($truck->t_kilometers && ($truck->t_kilometers % $truck->m_per_kilometer == 0)) {

                    //send notification
                    $provider = $truck->provider;
                    $provider->notify(new TruckMaintenance($truck));

                }//end of if

            }//end of for each

        });

    }//end of handle

}//end of command
