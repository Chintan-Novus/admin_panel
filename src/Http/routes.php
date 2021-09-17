<?php

Route::namespace('Novuslogics\AdminPanel\Http\Controllers')->group(function () {
// Guest route
    Route::middleware('guest')->group(function () {
        // Login
        Route::prefix('login')->group(function () {
            Route::get('', [Auth\AuthenticatedSessionController::class, 'create'])->name('login');
            Route::post('', [Auth\AuthenticatedSessionController::class, 'store']);
        });

        // Forgot password
        Route::prefix('forgot-password')->as('password.')->group(function () {
            Route::get('', [Auth\PasswordResetLinkController::class, 'create'])->name('request');
            Route::post('', [Auth\PasswordResetLinkController::class, 'store'])->name('email');
        });

        // Reset password
        Route::prefix('reset-password')->as('password.')->group(function () {
            Route::get('{token}', [Auth\NewPasswordController::class, 'create'])->name('reset');
            Route::post('', [Auth\NewPasswordController::class, 'store'])->name('update');
        });
    });

// Auth route
    Route::middleware('auth')->group(function () {
        // Logout
        Route::post('/logout', [Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');

        // Dashboard
        Route::view('dashboard', 'dashboard')->name('dashboard');

        // Account
        Route::prefix('account')->as('account.')->group(function () {
            // Profile
            Route::prefix('profile')->as('profile.')->group(function () {
                Route::get('edit', [ProfileController::class, 'edit'])->name('edit');
                Route::put('', [ProfileController::class, 'update'])->name('update');
                Route::put('dark_mode/change', [ProfileController::class, 'changeDarkMode'])->name('update.dark_mode');
            });

            // Change password
            Route::prefix('change-password')->as('change_password.')->group(function () {
                Route::get('', [ChangePasswordController::class, 'edit'])->name('edit');
                Route::put('', [ChangePasswordController::class, 'update'])->name('update');
            });
        });
    });
});