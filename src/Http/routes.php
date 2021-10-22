<?php

Route::middleware(config('admin_panel.routes.middleware'))->prefix(config('admin_panel.routes.prefix'))->group(function () {
    Route::view('', 'admin_panel::welcome')->name('welcome');

    // Guest route
    Route::middleware('guest')->group(function () {
        // Login
        Route::prefix('login')->group(function () {
            Route::get('', [Novuslogics\AdminPanel\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
            Route::post('', [Novuslogics\AdminPanel\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
        });

        // Forgot password
        Route::prefix('forgot-password')->as('password.')->group(function () {
            Route::get('', [Novuslogics\AdminPanel\Http\Controllers\Auth\PasswordResetLinkController::class, 'create'])->name('request');
            Route::post('', [Novuslogics\AdminPanel\Http\Controllers\Auth\PasswordResetLinkController::class, 'store'])->name('email');
        });

        // Reset password
        Route::prefix('reset-password')->as('password.')->group(function () {
            Route::get('{token}', [Novuslogics\AdminPanel\Http\Controllers\Auth\NewPasswordController::class, 'create'])->name('reset');
            Route::post('', [Novuslogics\AdminPanel\Http\Controllers\Auth\NewPasswordController::class, 'store'])->name('update');
        });
    });

    // Auth route
    Route::middleware('auth:'.config('admin_panel.routes.guard'))->group(function () {
        // Logout
        Route::post('/logout', [Novuslogics\AdminPanel\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');

        // Dashboard
        Route::view('dashboard', 'admin_panel::dashboard')->name('dashboard');

        // Account
        Route::prefix('account')->as('account.')->group(function () {
            // Profile
            Route::prefix('profile')->as('profile.')->group(function () {
                Route::get('edit', [Novuslogics\AdminPanel\Http\Controllers\ProfileController::class, 'edit'])->name('edit');
                Route::put('', [Novuslogics\AdminPanel\Http\Controllers\ProfileController::class, 'update'])->name('update');
                Route::put('dark_mode/change', [Novuslogics\AdminPanel\Http\Controllers\ProfileController::class, 'changeDarkMode'])->name('update.dark_mode');
            });

            // Change password
            Route::prefix('change-password')->as('change_password.')->group(function () {
                Route::get('', [Novuslogics\AdminPanel\Http\Controllers\ChangePasswordController::class, 'edit'])->name('edit');
                Route::put('', [Novuslogics\AdminPanel\Http\Controllers\ChangePasswordController::class, 'update'])->name('update');
            });
        });
    });
});