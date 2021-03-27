<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CheckGoAuthController extends Controller {

    public function __invoke(Request $request)
    {
//        //
//        $this->validate($request, [
//            'go_auth' => 'required',
//        ]);
        if (!$request->go_auth)
            return response(['status' => 'fails']);
        $goAuth = $request->go_auth;
        $user   = User::where('go_auth', $goAuth)->first();
        if ($user)
            return response(['status' => 'success', 'user_id' => $user->id]);
        else
            return response(['status' => 'fail']);
    }
}