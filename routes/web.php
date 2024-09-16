<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'index']);
Route::get('/event', [EventController::class, 'front']);
