<?php

namespace App\Console\Commands;

use http\Client\Curl\User;
use Illuminate\Console\Command;

class RunImportJob extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'run import not finish';

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
     * @return mixed
     */
    public function handle()
    {
        $user = \App\Models\User::whereHas('import', function ($q) {
            $q->notActive();
            $q->notComplete();
        })->first();
        if ($user)
        {
            \Log::info("start new import from job id:" . $user->id);
            \App\Jobs\StartImport::dispatch($user);
        } else
        {
            \Log::info("there is not import");
        }
    }
}


