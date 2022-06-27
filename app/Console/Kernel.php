<?php

namespace App\Console;

use App\Console\Commands\AfaqyUnits;
use App\Console\Commands\CheckMaintenance;
use App\Console\Commands\MakeRepositoryCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        AfaqyUnits::class,
        CheckMaintenance::class,
        MakeRepositoryCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('afaqy:units')->everyMinute();
        $schedule->command('check:maintenance')->dailyAt('10:00');;
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}