<?php

namespace App\Console\Commands;

use App\Models\Contact;
use App\Models\Group;
use Illuminate\Console\Command;

class ImportGroups extends Command {

    protected $signature = 'group:import';

    protected $description = 'Command description';

    public function handle()
    {
        //
        $groups = Group::isNew()->orderBy('updated_at')->with('users')->limit(5)->get();
        foreach ($groups as $group)
        {
            $group->getInfoRequest();
        }
    }
}
