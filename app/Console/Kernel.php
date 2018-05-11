<?php

namespace App\Console;

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
        // $schedule->command('inspire')
        //          ->hourly();

        $schedule->call(function () {
            //clear all expired session traces in the DB
            $time = time();
            $active_users = DB::table('users')
                            ->select('users_id', 'users_sessiontime')
                            ->where([
                                ['users_active', 1],
                                ['users_sessionkey', '!=', NULL],
                            ])
                            ->get();

            $user_ids = [];
            foreach ($active_users as $u) {
                if ($time - $u->users_sessiontime >= (15*60)) {
                    //this user's session has expired
                    $user_ids[] = $u->users_id;
                }
            }

            DB::table('users')
                ->whereIn('users_id', $user_ids)
                ->update(['users_sessionkey' => NULL, 'users_sessiontime' => NULL]);

        })->everyThirtyMinutes();

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
