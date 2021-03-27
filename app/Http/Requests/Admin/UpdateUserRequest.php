<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest {

    public function rules()
    {
        return [
            'email'    => ['required','email',
                           Rule::unique('users')->ignore(request('user')),
            ],
            'name'     => 'required',
            'password' => 'nullable|min:8',
        ];
    }

    public function authorize()
    {
        return auth('admin')->check();
    }
}