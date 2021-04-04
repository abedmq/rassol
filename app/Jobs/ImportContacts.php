<?php

namespace App\Jobs;

use App\Models\Contact;
use App\Models\Group;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ImportContacts implements ShouldQueue {

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        //

        \Log::info("start import groups");

        if ((!$this->user->imported_at) || Carbon::now()->diffInDays($this->user->imported_at) > 15)
        {
            if (!$this->user->import()->notComplete()->first())
            {
                $import = \App\Models\Import::create();
                $this->user->update(['import_id' => $import->id]);
                $this->user->load('import');
            }
            $chats = whatsapp()->getChats($this->user);

            \Log::info("تم الاستيراد بنجاح: " . sizeof((array)$chats));
            if (checkWhatsappResponse($chats))
            {
                $rs = $this->user->update(['imported_at' => Carbon::now()]);
                Log::info($rs);
            }
            \Log::info("start new import from job id:" . $this->user->id);

            StartImport::dispatch($this->user, true);

        }

    }
}