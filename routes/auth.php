<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\UserController;
use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    Route::get('login', [UserController::class, 'login_form'])->name('login');

    Route::post('login', [UserController::class, 'login'])->name('user.login.store');

    Route::get('register', [UserController::class, 'register_form'])->name('user.register.create');

    Route::post('register', [UserController::class, 'register'])->name('user.register.store');

    // Volt::route('register', 'pages.auth.register')
    //     ->name('register');

    Volt::route('dashboard/login', 'pages.auth.login')
        ->name('dashboard.login');

    Volt::route('forgot-password', 'pages.auth.forgot-password')
        ->name('password.request');

    Volt::route('reset-password/{token}', 'pages.auth.reset-password')
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Volt::route('verify-email', 'pages.auth.verify-email')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Volt::route('confirm-password', 'pages.auth.confirm-password')
        ->name('password.confirm');

    Route::get('logout', [UserController::class, 'logout'])->name('logout');
});
