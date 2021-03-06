<?php

namespace App\Console;

use App\Console\Commands\LivePlay\FilgoalCommand;
use App\Console\Commands\LivePlay\KoraextraCommand;
use App\Console\Commands\LivePlay\YallaShootCommand;
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
        Commands\TestEventCommand::class,
        Commands\LivePlay\YallaShootCommand::class,
        Commands\LivePlay\FilgoalCommand::class,
        Commands\LivePlay\KoraextraCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('pusher:test')
             ->everyMinute();
    }

    /**
     * Register the commands for the application.
     *     * * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
