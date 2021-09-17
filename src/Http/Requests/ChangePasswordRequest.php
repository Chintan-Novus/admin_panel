<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules;

class ChangePasswordRequest extends Request
{
    public function rules(): array
    {
        return [
            'current_password' => 'required|current_password',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    public function messages(): array
    {
        return [
            'current_password.current_password' => 'Password not match.'
        ];
    }
}
