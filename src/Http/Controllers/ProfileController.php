<?php

namespace Novuslogics\AdminPanel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Novuslogics\AdminPanel\Http\Requests\ProfileRequest;

class ProfileController
{
    public function edit()
    {
        return view('admin_panel::account.profile.edit');
    }

    public function update(ProfileRequest $request): \Illuminate\Http\RedirectResponse
    {
        #Request params
        $name = $request->input('name');
        $email = $request->input('email');

        // Update profile
        $user = Auth::guard(config('admin_panel.routes.guard'))->user();
        $user->name = $name;
        $user->email = $email;
        $user->save();

        return redirect()->back()->with('status', 'Profile updated successfully.');
    }

    public function changeDarkMode(Request $request): \Illuminate\Http\RedirectResponse
    {
        $darkMode = filter_var($request->input('dark_mode'), FILTER_VALIDATE_BOOLEAN);

        $request->session()->put('dark_mode', $darkMode);

        return redirect()->back();
    }
}
