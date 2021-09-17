<?php

namespace Novuslogics\AdminPanel\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Novuslogics\AdminPanel\Http\Requests\ChangePasswordRequest;

class ChangePasswordController
{
    public function edit()
    {
        return view('account.change_password');
    }

    public function update(ChangePasswordRequest $request): \Illuminate\Http\RedirectResponse
    {
        #Request params
        $password = $request->input('password');

        // Update profile
        $user = Auth::user();
        $user->password = Hash::make($password);
        $user->save();

        return redirect()->back()->with('status', 'Password change successfully.');
    }
}
