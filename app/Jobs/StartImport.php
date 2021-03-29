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

class StartImport implements ShouldQueue {

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        //
        \Log::info("start import 2 ", $this->user->toArray());

        if ($import = $this->user->import)
        {
            \Log::info("import data ", $import->toArray());
            $import->update(['status' => 'in_progress']);

            $groups = $import->groups()->where('status', 0)->limit(50)->get();
            Log::info("we will import " . $groups->count() . " group : ", $groups->toArray());
            whatsapp()->connect($this->user);
            Log::info("whatsapp connected");
            if ($groups->count())
            {
                Log::info("user start import:", $this->user->toArray());
                foreach ($groups as $group)
                {
                    $count = $group->getInfo($this->user);
                    $group->pivot->update(['count' => $count, 'status' => 1]);

                }
            }
            if (!$import->groups()->where('status', 0)->limit(50)->count())
            {
                $import->update(['status' => 'finish']);
            }


            whatsapp()->disconnect($this->user);

        } else
        {
            Log::info("Import not found id : " . $this->user->id);
        }
    }
}