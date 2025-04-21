<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Row;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');
    Route::get('user-login',[AuthenticatedSessionController::class,'user_login'])->name('user-login');

    Route::get('franchise-register',[RegisteredUserController::class,'franchise_register'])->name('franchise-register');
    Route::post('franchise-user-store',[RegisteredUserController::class,'franchise_user_store'])->name('franchise-user-store');
    Route::get('student-registration',[RegisteredUserController::class,'student_registration'])->name('student-registration');
    Route::post('student-store',[RegisteredUserController::class,'student_store'])->name('student-store');
    Route::get('counselor-register',[RegisteredUserController::class,'counselor_register'])->name('counselor_register');
    Route::post('counselor-register-store',[RegisteredUserController::class,'counselor_register_store'])->name('counselor-register-store');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
    Route::get('login/send-otp', [AuthenticatedSessionController::class, 'sendOTP'])->name('login.sendOTP');
    Route::post('login/verify-otp', [AuthenticatedSessionController::class, 'verifyOTP'])->name('login.verifyOTP');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
