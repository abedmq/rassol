<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->detail)
            return view('front.dashboard');
        else if (auth()->user()->isAdmin())
            return redirect()->route('whatsapp.link');
        else
            return redirect()->route('whatsapp.login');
    }
}
