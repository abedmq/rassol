<?php

namespace App\Jobs;

use App\Models\Facebook\File;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ReadFacebookFile implements ShouldQueue {

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $fileModel;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($fileModel)
    {
        //


        $this->fileModel = $fileModel;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $this->fileModel->update(['status' => File::IN_PROGRESS_STATUS]);
        $file    = new SplFileObject(storage_path($this->fileModel->file_path));
        $LineNum = $this->fileModel->file_line;
        $file->seek($LineNum);
        for ($i = 0; $i < intval(config('env.FACEBOOK_IMPORT_COUNT')); $i++)
        {
            \App\Models\Facebook\User::import($file->current());
            $LineNum++;
            $this->fileModel->update(['file_line' => $LineNum]);
            if ($file->eof())
            {
                $this->fileModel->update(['status' => File::COMPLETE_STATUS]);
                break;
            }
            $file->next();
        }
        $this->fileModel->update(['status' => File::IDLE_STATUS]);

    }
}
