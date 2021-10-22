<?php

namespace Novuslogics\AdminPanel\Http\Requests;

class ProfileRequest extends Request
{
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
        ];
    }
}
