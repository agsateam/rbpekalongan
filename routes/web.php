<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\FasilitatorController;
use App\Http\Controllers\admin\FungsiRBController;
use App\Http\Controllers\admin\HeroController;
use App\Http\Controllers\admin\LinkMedsosController;
use App\Http\Controllers\admin\ManageBookingController;
use App\Http\Controllers\admin\ManageEventController;
use App\Http\Controllers\admin\ManageProductController;
use App\Http\Controllers\admin\ManageRoomController;
use App\Http\Controllers\admin\ManageTestiController;
use App\Http\Controllers\admin\ManageUmkmController;
use App\Http\Controllers\admin\MitraController;
use App\Http\Controllers\admin\StatistikController;
// use App\Http\Controllers\admin\MitraController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DataController;
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
Route::get('/testimoni/send', [ManageTestiController::class, 'create'])->name('testi.add');
Route::post('/testimoni/send', [ManageTestiController::class, 'store'])->name('testi.send');
Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.send');
Route::get('/booking-success', [BookingController::class, 'success'])->name('booking.success');
Route::get('/booking/checkin', [BookingController::class, 'checkin'])->name('booking.checkin');
Route::post('/booking/checkin', [BookingController::class, 'checkinUpdate'])->name('booking.checkin.update');

Route::get('api/statistik', [DataController::class, 'getData']);

// Auth
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// BackEnd
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Manage Users
    Route::get('/admin/password', [AdminController::class, 'changePassword'])->name('admin.password');
    Route::post('/admin/password', [AdminController::class, 'updatePassword'])->name('admin.password.save');
    Route::get('/admin/password/{id?}', [AdminController::class, 'resetPassword'])->name('admin.password.reset');
    Route::get('/manage-admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/manage-admin/profile/{id?}', [AdminController::class, 'edit'])->name('admin.profile');
    Route::post('/manage-admin/profile', [AdminController::class, 'update'])->name('admin.profile.update');
    Route::get('/manage-admin/delete/{id?}', [AdminController::class, 'destroy'])->name('admin.delete');
    Route::get('/manage-admin/add', [AdminController::class, 'create'])->name('admin.add');
    Route::post('/manage-admin/add', [AdminController::class, 'store'])->name('admin.save');
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

    // #### Produk UMKM jadinya ambil dari content IG Gerai UMKM
    // Manage UMKM Product
    // Route::get('/manage-umkm/products', [ManageProductController::class, 'index'])->name('manage.product');
    // Route::get('/manage-umkm/products/data', [ManageProductController::class, 'data'])->name('manage.product.data');
    // Route::get('/manage-umkm/products/detail/{id?}', [ManageProductController::class, 'detail'])->name('manage.product.detail');
    // Route::get('/manage-umkm/products/add', [ManageProductController::class, 'create'])->name('manage.product.add');
    // Route::post('/manage-umkm/products/add', [ManageProductController::class, 'store'])->name('manage.product.save');
    // Route::get('/manage-umkm/products/edit/{id?}', [ManageProductController::class, 'edit'])->name('manage.product.edit');
    // Route::post('/manage-umkm/products/update', [ManageProductController::class, 'update'])->name('manage.product.update');
    // Route::get('/manage-umkm/products/delete/{id?}', [ManageProductController::class, 'destroy'])->name('manage.product.delete');

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
    // Manage Event
    Route::get('/manage-testi', [ManageTestiController::class, 'index'])->name('manage.testi');
    Route::get('/manage-testi/verify', [ManageTestiController::class, 'verify'])->name('manage.testi.verify');
    Route::get('/manage-testi/accept/{id?}', [ManageTestiController::class, 'accept'])->name('manage.testi.accept');
    Route::get('/manage-testi/reject/{id?}', [ManageTestiController::class, 'reject'])->name('manage.testi.reject');
    Route::get('/manage-testi/delete/{id?}', [ManageTestiController::class, 'delete'])->name('manage.testi.delete');
    // Manage Bookings
    Route::get('/manage-booking', [ManageBookingController::class, 'index'])->name('manage.booking');
    Route::get('/manage-booking/history', [ManageBookingController::class, 'history'])->name('manage.booking.history');
    Route::get('/manage-booking/data', [ManageBookingController::class, 'getData'])->name('manage.booking.data');
    Route::get('/manage-booking/open', [ManageBookingController::class, 'open'])->name('manage.booking.open');
    Route::get('/manage-booking/open/update/{status?}', [ManageBookingController::class, 'openUpdate'])->name('manage.booking.open.update');
    Route::get('/manage-booking/checkin/{id?}', [ManageBookingController::class, 'checkin'])->name('manage.booking.checkin');
    Route::get('/manage-booking/cancel/{id?}', [ManageBookingController::class, 'cancel'])->name('manage.booking.cancel');
    // Manage Room
    Route::get('/manage-booking/room', [ManageRoomController::class, 'index'])->name('manage.room');
    Route::get('/manage-booking/room/detail/{id?}', [ManageRoomController::class, 'detail'])->name('manage.room.detail');
    Route::get('/manage-booking/room/add', [ManageRoomController::class, 'add'])->name('manage.room.add');
    Route::post('/manage-booking/room/add', [ManageRoomController::class, 'store'])->name('manage.room.save');
    Route::get('/manage-booking/room/edit/{id?}', [ManageRoomController::class, 'edit'])->name('manage.room.edit');
    Route::post('/manage-booking/room/update', [ManageRoomController::class, 'update'])->name('manage.room.update');
    Route::get('/manage-booking/room/delete/{id?}', [ManageRoomController::class, 'delete'])->name('manage.room.delete');
    Route::get('/manage-booking/room/booking-status/{id?}/{status?}', [ManageRoomController::class, 'status'])->name('manage.room.status');
    // ---- Room Times
    Route::post('/manage-booking/room/time/add', [ManageRoomController::class, 'saveTime'])->name('manage.room.time.save');
    Route::post('/manage-booking/room/time/update', [ManageRoomController::class, 'updateTime'])->name('manage.room.time.update');
    Route::get('/manage-booking/room/time/drop/{id?}', [ManageRoomController::class, 'dropTime'])->name('manage.room.time.delete');

    // Web Content
    Route::prefix('webcontent')->group(function () {
        // Fungsi
        Route::get('fungsi', [FungsiRBController::class, 'index'])->name('webcontent.fungsi');
        Route::get('fungsi/{id?}', [FungsiRBController::class, 'edit'])->name('webcontent.fungsiedit');
        Route::put('fungsi/{id?}', [FungsiRBController::class, 'update'])->name('webcontent.fungsiupdate');
        // Mitra
        Route::get('mitra', [MitraController::class, 'index'])->name('webcontent.mitra');
        Route::get('mitra/create', [MitraController::class, 'create'])->name('webcontent.mitra.create');
        Route::post('mitra/create', [MitraController::class, 'store'])->name('webcontent.mitra.save');
        Route::get('mitra/edit/{id?}', [MitraController::class, 'edit'])->name('webcontent.mitra.edit');
        Route::put('mitra/update/{id?}', [MitraController::class, 'update'])->name('webcontent.mitra.update');
        Route::delete('mitra/delete/{id}', [MitraController::class, 'destroy'])->name('webcontent.mitra.delete');
        // Video Profile
        Route::get('profile-video', [BerandaController::class, 'videoEdit'])->name('webcontent.video');
        Route::post('profile-video', [BerandaController::class, 'videoUpdate'])->name('webcontent.video.update');
        // IG Token
        Route::get('igtoken', [BerandaController::class, 'igTokenEdit'])->name('webcontent.igtoken');
        Route::post('igtoken', [BerandaController::class, 'igTokenUpdate'])->name('webcontent.igtoken.update');
        // Hero
        Route::get('hero', [HeroController::class, 'index'])->name('webcontent.hero');
        Route::get('hero/edit/{id?}', [HeroController::class, 'edit'])->name('webcontent.hero.edit');
        Route::put('hero/update/{id?}', [HeroController::class, 'update'])->name('webcontent.hero.update');
        //Statistik
        Route::get('statistik', [StatistikController::class, 'index'])->name('webcontent.statistik');
        Route::get('statistik/detail/{id?}', [StatistikController::class, 'getData'])->name('webcontent.statistik.getdata');
        Route::get('statistik/data/{id}', [StatistikController::class, 'ambilData'])->name('webcontent.statistik.data');
        Route::get('statistik/create', [StatistikController::class, 'create'])->name('webcontent.statistik.create');
        Route::post('statistik/store', [StatistikController::class, 'store'])->name('webcontent.statistik.store');
        Route::delete('statistik/delete/{id}', [StatistikController::class, 'destroy'])->name('webcontent.statistik.delete');
        Route::get('statistik/edit/{id?}', [StatistikController::class, 'edit'])->name('webcontent.statistik.edit');
        Route::put('statistik/update/{id?}', [StatistikController::class, 'update'])->name('webcontent.statistik.update');
        //Link
        Route::get('linkmedsos', [LinkMedsosController::class, 'index'])->name('webcontent.link');
        Route::put('linkmedsos/update/{id?}', [LinkMedsosController::class, 'update'])->name('webcontent.link.update');
    });
});
