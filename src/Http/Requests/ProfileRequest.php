<?php

namespace App\Http\Requests_;

class ProfileRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ];
    }
}
