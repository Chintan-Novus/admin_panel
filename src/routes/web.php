<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::view('/', 'welcome')->name('welcome');

// Guest route
Route::middleware('guest')->group(function () {
    // Login
    Route::prefix('login')->group(function () {
        Route::get('', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
    });

    // Forgot password
    Route::prefix('forgot-password')->as('password.')->group(function () {
        Route::get('', [App\Http\Controllers\Auth\PasswordResetLinkController::class, 'create'])->name('request');
        Route::post('', [App\Http\Controllers\Auth\PasswordResetLinkController::class, 'store'])->name('email');
    });

    // Reset password
    Route::prefix('reset-password')->as('password.')->group(function () {
        Route::get('{token}', [App\Http\Controllers\Auth\NewPasswordController::class, 'create'])->name('reset');
        Route::post('', [App\Http\Controllers\Auth\NewPasswordController::class, 'store'])->name('update');
    });
});

// Auth route
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Dashboard
    Route::view('dashboard', 'dashboard')->name('dashboard');

    // Account
    Route::prefix('account')->as('account.')->group(function () {
        // Profile
        Route::prefix('profile')->as('profile.')->group(function () {
            Route::get('edit', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('edit');
            Route::put('', [\App\Http\Controllers\ProfileController::class, 'update'])->name('update');
            Route::put('dark_mode/change', [\App\Http\Controllers\ProfileController::class, 'changeDarkMode'])->name('update.dark_mode');
        });

        // Change password
        Route::prefix('change-password')->as('change_password.')->group(function () {
            Route::get('', [\App\Http\Controllers\ChangePasswordController::class, 'edit'])->name('edit');
            Route::put('', [\App\Http\Controllers\ChangePasswordController::class, 'update'])->name('update');
        });
    });
});
