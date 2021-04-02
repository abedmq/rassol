<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest {

    public function rules()
    {
        return [
            'email'    => 'required|unique:users',
            'name'     => 'required',
            'password' => 'required|min:8',
        ];
    }

    public function authorize()
    {
        return auth('admin')->check();
    }
}