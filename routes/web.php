<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ManageEventController;
use App\Http\Controllers\admin\ManageUmkmController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FungsiController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// FrontEnd
Route::get('/', [BerandaController::class, 'index'])->name('home');
Route::get('/event', [EventController::class, 'front'])->name('event');
Route::get('/event/regist/{id?}', [EventController::class, 'regist'])->name('event.regist');
Route::post('/event/regist', [EventController::class, 'registPost'])->name('event.regist.send');
Route::get('/event/regist-success', [EventController::class, 'registSuccess'])->name('event.regist.success');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/umkm/regist', [ContactController::class, 'regist'])->name('umkm.regist');
Route::get('/umkm/regist-success', [ContactController::class, 'registSuccess'])->name('umkm.regist.success');

// Auth
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// BackEnd
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Manage UMKM
    Route::get('/manage-umkm', [ManageUmkmController::class, 'index'])->name('manage.umkm');
    Route::get('/manage-umkm/data', [ManageUmkmController::class, 'getData'])->name('manage.umkm.data');
    Route::get('/manage-umkm/regist', [ManageUmkmController::class, 'manageRegist'])->name('manage.umkm.regist');
    Route::get('/manage-umkm/accept/{id?}', [ManageUmkmController::class, 'accept'])->name('manage.umkm.accept');
    Route::get('/manage-umkm/reject/{id?}', [ManageUmkmController::class, 'reject'])->name('manage.umkm.reject');
    // Manage Event
    Route::get('/manage-event', [ManageEventController::class, 'index'])->name('manage.event');
    Route::get('/manage-event/data', [ManageEventController::class, 'getData'])->name('manage.event.data');
    Route::get('/manage-event/detail/{id?}', [ManageEventController::class, 'detail'])->name('manage.event.detail');
    Route::get('/manage-event/new', [ManageEventController::class, 'create'])->name('manage.event.new');
    Route::post('/manage-event/new', [ManageEventController::class, 'store'])->name('manage.event.save');
    Route::get('/manage-event/edit/{id?}', [ManageEventController::class, 'edit'])->name('manage.event.edit');
    Route::post('/manage-event/update', [ManageEventController::class, 'update'])->name('manage.event.update');
    Route::get('/manage-event/delete/{id?}', [ManageEventController::class, 'destroy'])->name('manage.event.delete');
    Route::post('/manage-event/done', [ManageEventController::class, 'done'])->name('manage.event.done');
    Route::get('/manage-event/regist', [EventController::class, 'index'])->name('manage.eventregist');
    Route::get('/manage-event/regist/data', [EventController::class, 'getData'])->name('manage.eventregist.data');
    Route::get('/manage-event/regist/accept/{id?}', [EventController::class, 'accept'])->name('manage.eventregist.accept');
    Route::get('/manage-event/regist/reject/{id?}', [EventController::class, 'reject'])->name('manage.eventregist.reject');
    // Web Content

    // Fungsi
    Route::get('/webcontent/fungsi', [FungsiController::class, 'index'])->name('webcontent.fungsi');
});
