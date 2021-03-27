<?php

namespace App\Console\Commands;

use App\Models\Contact;
use Illuminate\Console\Command;

class ImportContacts extends Command {

    protected $signature = 'contact:import';

    protected $description = 'Command description';

    public function handle()
    {
        //
        $contacts = Contact::isNew()->orderBy('updated_at')->with('users')->limit(5)->get();
        $this->info('contact count:' . $contacts->count() . "\n");

        foreach ($contacts as $contact)
        {
            $this->info('start no:' . $contact->id . "\n");

            $contact->getInfoRequest();
        }
    }
}
