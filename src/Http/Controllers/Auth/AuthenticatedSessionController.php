<?php

namespace Novuslogics\AdminPanel\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Novuslogics\AdminPanel\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): \Illuminate\Http\RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $request->session()->put('dark_mode', false);

        return redirect()->intended(route('dashboard'));
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
