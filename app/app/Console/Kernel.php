<?php

namespace App\Console;

use App\Console\Commands\AddUserPoints;
use App\Console\Commands\ForceDeleteUser;
use App\Console\Commands\RemoveUserPoints;
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
        AddUserPoints::class,
        ForceDeleteUser::class,
        RemoveUserPoints::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //add user point 毎月1日に実行
//        $schedule->command('batch:addUserPoints')
//          ->monthlyOn(1,'9:00');      //本番用
        $schedule->command('batch:removeUserPoints')
            ->monthlyOn(1,'9:00');

        $schedule->command('batch:addUserPoints')
            ->monthlyOn(1,'9:00');            //test用

        //force delete user 毎日深夜12時に実行
        $schedule->command('batch:forceDeleteUser')
            ->daily();
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
