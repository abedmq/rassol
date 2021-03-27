<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagRequest;
use App\Models\Contact;
use App\Models\Field;
use App\Models\Group;

class ContactsController extends BaseController {

    protected $modelClass = Contact::class;
    protected $title      = 'ارقام الواتس';
    protected $route      = 'contacts';


    public function index($query = null)
    {
        $query=Contact::withCount(['users','groups']);
        return parent::index($query); // TODO: Change the autogenerated stub
    }

}