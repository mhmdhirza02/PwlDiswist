<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\WisataController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\KulinerController;
use App\Http\Controllers\Admin\PackageController;


//PUBLIC / USER
Route::get('/', [HomeController::class, 'index']);
Route::get('/wisata', [HomeController::class, 'wisata'])->name('wisata');
Route::get('/wisata/{id}', [HomeController::class, 'detail'])->name('wisata.detail');
Route::get('/kuliner', [HomeController::class, 'kuliner'])->name('kuliner');
Route::get('/kuliner/{id}', [HomeController::class, 'kulinerDetail'])->name('kuliner.detail');
Route::get('/hotel', [HomeController::class, 'hotel'])->name('hotel');
Route::get('/hotel/{id}', [HomeController::class, 'hotelDetail'])->name('hotel.detail');
Route::get('/paket', [HomeController::class, 'paket'])->name('paket');
Route::get('/artikel', [HomeController::class, 'artikel'])->name('artikel');
Route::get('/artikel/{id}', [HomeController::class, 'artikelDetail'])->name('artikel.detail');
Route::get('/booking', [App\Http\Controllers\BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/success', [App\Http\Controllers\BookingController::class, 'success'])->name('booking.success');


//AUTH
Route::get('/login', [AuthController::class,'loginForm'])->name('login');
Route::post('/login', [AuthController::class,'login']);
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class,'logout'])->name('logout');


// USER DASHBOARD
Route::get('/dashboard', [\App\Http\Controllers\UserDashboardController::class, 'index'])
    ->middleware('auth')
    ->name('user.dashboard');
Route::get('/dashboard/pay/{id}', [\App\Http\Controllers\UserDashboardController::class, 'pay'])
    ->middleware('auth')
    ->name('user.pay');


//ADMIN (PROTECTED)
Route::middleware(['auth','admin'])->group(function () {

    // Dashboard
    Route::get('/admin', [AdminController::class, 'dashboard']);

    // Wisata CRUD
    Route::get('/admin/wisata', [WisataController::class, 'index']);
    Route::get('/admin/wisata/create', [WisataController::class, 'create']);
    Route::post('/admin/wisata', [WisataController::class, 'store']);
    Route::get('/admin/wisata/{id}/edit', [WisataController::class, 'edit']);
    Route::post('/admin/wisata/{id}', [WisataController::class, 'update']);
    Route::delete('/admin/wisata/{id}', [WisataController::class, 'destroy']);

    // Artikel CRUD
    Route::resource('/admin/artikel', ArtikelController::class);

    // Hotel CRUD
    Route::get('/admin/hotel', [HotelController::class, 'index']);
    Route::get('/admin/hotel/create', [HotelController::class, 'create']);
    Route::post('/admin/hotel', [HotelController::class, 'store']);
    Route::get('/admin/hotel/{id}/edit', [HotelController::class, 'edit']);
    Route::put('/admin/hotel/{id}', [HotelController::class, 'update']);
    Route::delete('/admin/hotel/{id}', [HotelController::class, 'destroy']);

    Route::delete('/admin/hotel/galeri/{id}', [HotelController::class, 'destroyGaleri'])->name('admin.hotel.galeri.destroy');

    // Kuliner CRUD
    Route::get('/admin/kuliner', [KulinerController::class, 'index']);
    Route::get('/admin/kuliner/create', [KulinerController::class, 'create']);
    Route::post('/admin/kuliner', [KulinerController::class, 'store']);
    Route::get('/admin/kuliner/{id}/edit', [KulinerController::class, 'edit']);
    Route::put('/admin/kuliner/{id}', [KulinerController::class, 'update']);
    Route::delete('/admin/kuliner/{id}', [KulinerController::class, 'destroy']);

    // Paket CRUD
    Route::get('/admin/paket', [PackageController::class, 'index']);
    Route::get('/admin/paket/create', [PackageController::class, 'create']);
    Route::post('/admin/paket', [PackageController::class, 'store']);
    Route::get('/admin/paket/{id}/edit', [PackageController::class, 'edit']);
    Route::put('/admin/paket/{id}', [PackageController::class, 'update']);
    Route::delete('/admin/paket/{id}', [PackageController::class, 'destroy']);

    Route::delete('/admin/wisata/galeri/{id}', [WisataController::class, 'destroyGaleri'])->name('admin.wisata.galeri.destroy');
});

Route::post('/reviews', [App\Http\Controllers\ReviewController::class, 'store'])->name('reviews.store')->middleware('auth');
