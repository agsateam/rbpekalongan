<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ManageEventController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'index'])->name('home');
Route::get('/event', [EventController::class, 'front'])->name('event');
Route::get('/event/regist/{id?}', [EventController::class, 'regist'])->name('event.regist');
Route::post('/event/regist', [EventController::class, 'registPost'])->name('event.regist.send');
Route::get('/event/regist-success', [EventController::class, 'registSuccess'])->name('event.regist.success');

// Admin
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Manage Event
    Route::get('/manage-event', [ManageEventController::class, 'index'])->name('manage.event');
    Route::get('/manage-event/new', [ManageEventController::class, 'create'])->name('manage.event.new');
    Route::post('/manage-event/new', [ManageEventController::class, 'store'])->name('manage.event.save');
    Route::get('/manage-event/data', [ManageEventController::class, 'getData'])->name('manage.event.data');
    Route::get('/manage-event/edit/{id?}', [ManageEventController::class, 'index'])->name('manage.event.edit');
    Route::get('/manage-event/delete/{id?}', [ManageEventController::class, 'destroy'])->name('manage.event.delete');
    Route::post('/manage-event/done', [ManageEventController::class, 'done'])->name('manage.event.done');
});