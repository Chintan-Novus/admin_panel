<?php

namespace Novuslogics\AdminPanel\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $pageTitle = "Update Profile";
        $pageMeta = [
            [
                'name' => 'description',
                'content' => 'description: Loream Ipsum',
            ],
            [
                'name' => 'keywords',
                'content' => 'keywords, test1, test2',
            ]
        ];

        return view('account.profile.edit', compact('pageTitle', 'pageMeta'));
    }

    public function update(ProfileRequest $request): \Illuminate\Http\RedirectResponse
    {
        #Request params
        $name = $request->input('name');
        $email = $request->input('email');

        // Update profile
        $user = Auth::user();
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
