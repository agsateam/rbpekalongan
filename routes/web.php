<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\FasilitatorController;
use App\Http\Controllers\admin\ManageEventController;
use App\Http\Controllers\admin\ManageProductController;
use App\Http\Controllers\admin\ManageUmkmController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FungsiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
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
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/umkm-binaan', [ProductController::class, 'umkm'])->name('umkm-binaan');
Route::get('/product/{id?}', [ProductController::class, 'productDetail'])->name('product.detail');
Route::get('/umkm/detail/{id?}', [ProductController::class, 'umkmDetail'])->name('umkm.detail');

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
    Route::get('/manage-umkm/detail/{id?}', [ManageUmkmController::class, 'detail'])->name('manage.umkm.detail');
    Route::get('/manage-umkm/regist', [ManageUmkmController::class, 'manageRegist'])->name('manage.umkm.regist');
    Route::get('/manage-umkm/accept/{id?}', [ManageUmkmController::class, 'accept'])->name('manage.umkm.accept');
    Route::get('/manage-umkm/reject/{id?}', [ManageUmkmController::class, 'reject'])->name('manage.umkm.reject');
    Route::get('/manage-umkm/edit/{id?}', [ManageUmkmController::class, 'edit'])->name('manage.umkm.edit');
    Route::post('/manage-umkm/update', [ManageUmkmController::class, 'update'])->name('manage.umkm.update');
    Route::get('/manage-umkm/delete/{id?}', [ManageUmkmController::class, 'destroy'])->name('manage.umkm.delete');
    // Manage UMKM Product
    Route::get('/manage-umkm/products', [ManageProductController::class, 'index'])->name('manage.product');
    Route::get('/manage-umkm/products/data', [ManageProductController::class, 'data'])->name('manage.product.data');
    Route::get('/manage-umkm/products/detail/{id?}', [ManageProductController::class, 'detail'])->name('manage.product.detail');
    Route::get('/manage-umkm/products/add', [ManageProductController::class, 'create'])->name('manage.product.add');
    Route::post('/manage-umkm/products/add', [ManageProductController::class, 'store'])->name('manage.product.save');
    Route::get('/manage-umkm/products/edit/{id?}', [ManageProductController::class, 'edit'])->name('manage.product.edit');
    Route::post('/manage-umkm/products/update', [ManageProductController::class, 'update'])->name('manage.product.update');
    Route::get('/manage-umkm/products/delete/{id?}', [ManageProductController::class, 'destroy'])->name('manage.product.delete');
    // Manage Fasilitator
    Route::get('/manage-fasilitator', [FasilitatorController::class, 'index'])->name('manage.fasilitator');
    Route::get('/manage-fasilitator/add', [FasilitatorController::class, 'create'])->name('manage.fasilitator.add');
    Route::post('/manage-fasilitator/add', [FasilitatorController::class, 'store'])->name('manage.fasilitator.save');
    Route::get('/manage-fasilitator/edit/{id?}', [FasilitatorController::class, 'edit'])->name('manage.fasilitator.edit');
    Route::post('/manage-fasilitator/update', [FasilitatorController::class, 'update'])->name('manage.fasilitator.update');
    Route::get('/manage-fasilitator/delete/{id?}', [FasilitatorController::class, 'destroy'])->name('manage.fasilitator.delete');
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

    Route::prefix('webcontent')->group(function () {
        Route::get('fungsi', [FungsiController::class, 'index'])->name('webcontent.fungsi');
        Route::post('fungsi', [FungsiController::class, 'store'])->name('webcontent.fungsiupdate');
    });
});
