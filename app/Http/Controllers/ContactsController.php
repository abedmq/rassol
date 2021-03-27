<?php

namespace App\Http\Controllers;

class ContactsController extends Controller {

    public function index()
    {
        //
        $user     = auth()->user();
        $contacts = $user->contacts;
        $view     = view('front.whatsapp.partials.contact_list', compact('contacts'))->render();
        return $this->response(['view' => $view])->success('تم جلب الارقام');
    }
}