<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\System\MigrationController;

Route::get('/', function () {
    return view('home');
});


Route::post('/system/migrate', [MigrationController::class, 'run'])
    ->middleware('throttle:5,1')
    ->name('system.migrate');