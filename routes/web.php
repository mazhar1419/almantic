<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\System\MigrationController;
use App\Http\Controllers\Auth\AuthController;


/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get(
    '/',
    function () {
        return view('home');
    }
)->name('home');


/*
|--------------------------------------------------------------------------
| System Migration
|--------------------------------------------------------------------------
*/

Route::get(
    '/system/migrate',
    [MigrationController::class, 'index']
)->name('system.migrate.page');

Route::post(
    '/system/migrate',
    [MigrationController::class, 'run']
)->name('system.migrate');

Route::get(
    '/system/migrate/result',
    [MigrationController::class, 'result']
)->name('system.migrate.result');


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware('custom.auth')->group(function () {

    Route::get(
        '/dashboard',
        function () {
            return view('dashboard');
        }
    )->name('dashboard');
    
    Route::post(
    '/logout',
    [AuthController::class, 'logout']
)->name('logout');

});


/*
|--------------------------------------------------------------------------
| Guest Authentication
|--------------------------------------------------------------------------
*/

Route::middleware('custom.guest')->group(function () {

    Route::get(
        '/register',
        [AuthController::class, 'showRegister']
    )->name('register');

    Route::post(
        '/register',
        [AuthController::class, 'register']
    )->name('register.store');


    Route::get(
        '/login',
        [AuthController::class, 'showLogin']
    )->name('login');

    Route::post(
        '/login',
        [AuthController::class, 'login']
    )->name('login.store');


    Route::get(
        '/forgot-password',
        [AuthController::class, 'showForgotPassword']
    )->name('password.request');

    Route::post(
        '/forgot-password',
        [AuthController::class, 'sendPasswordReset']
    )->name('password.email');


    Route::get(
        '/reset-password/{token}',
        [AuthController::class, 'showResetPassword']
    )->name('password.reset');

    Route::post(
        '/reset-password',
        [AuthController::class, 'resetPassword']
    )->name('password.update');


    Route::get(
        '/verify-email/{token}',
        [AuthController::class, 'verifyEmail']
    )->name('verification.verify');


    Route::get(
        '/resend-verification',
        [AuthController::class, 'showResendVerification']
    )->name('verification.resend');

    Route::post(
        '/resend-verification',
        [AuthController::class, 'resendVerification']
    )->name('verification.resend.store');

});