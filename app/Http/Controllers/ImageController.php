<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller {

    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image',
        ]);
        $image          = $request->file('file');
        $upload_success = $image->store('temp');

        if ($upload_success)
        {
            return response()->json(['name' => $upload_success], 200);
        } // Else, return error 400
        else
        {
            return response()->json('error', 400);
        }
    }
}