<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\System\MigrationController;

Route::get('/', function () {return view('home');})->name('home');


Route::get('/system/migrate',[MigrationController::class, 'index'])->name('system.migrate.page');

Route::post('/system/migrate',[MigrationController::class, 'run'])->name('system.migrate');

Route::get('/system/migrate/result',[MigrationController::class, 'result'])->name('system.migrate.result');