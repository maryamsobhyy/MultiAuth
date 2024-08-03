<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuth\PasswordController;
use App\Http\Controllers\AdminAuth\NewPasswordController;
use App\Http\Controllers\AdminAuth\VerifyEmailController;
use App\Http\Controllers\AdminAuth\PasswordResetLinkController;
use App\Http\Controllers\AdminAuth\ConfirmablePasswordController;
use App\Http\Controllers\AdminAuth\AuthenticatedSessionController;
use App\Http\Controllers\AdminAuth\EmailVerificationPromptController;
use App\Http\Controllers\AdminAuth\EmailVerificationNotificationController;
use App\Http\Controllers\AdminAuth\RegisteredUserController;

Route::middleware('guest:admin')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});



Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
