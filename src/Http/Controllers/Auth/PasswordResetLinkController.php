<?php

namespace Novuslogics\AdminPanel\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController
{
    public function broker(): \Illuminate\Contracts\Auth\PasswordBroker
    {
        return Password::broker(config('admin_panel.routes.broker'));
    }

    public function create()
    {
        return view('admin_panel::auth.forgot-password');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
            ? redirect()->route('login')->with('status', __($status))
            : back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
    }
}
