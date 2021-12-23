<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use Carbon\Carbon;
use App\Booking;
// use Faker\Generator as Faker;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /*
        * scheduller to update booking status become expired after 24 hour.
        * run cron job on your server
        * to execute this command 
        * php artisan schedule:run
        */

        // $schedule->command('inspire')->hourly();
        
        $now = Carbon::now()->format('Y-m-d H:i:s');       
        $schedule->call(function () use ($now){
            Booking::where('booking_time', '<', $now)
            ->where('status', 0)
            ->update(['status' => 1]);
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
