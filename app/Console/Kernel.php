<?php

namespace App\Console;

use App\Console\Commands\ImportContacts;
use App\Jobs\ReadFacebookFile;
use App\Models\Facebook\File;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands
        = [
            //
            ImportContacts::class,
        ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//         $schedule->command('queue:run')->everyFiveMinutes();
        $schedule->command('import:run')->everyFiveMinutes();
        $schedule->call(function () {
            $fileModel = File::canImport()->first();
            if ($fileModel && $fileModel->status != File::IN_PROGRESS_STATUS)
            {
                ReadFacebookFile::dispatch($fileModel);
            }
        })->hourly();
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
