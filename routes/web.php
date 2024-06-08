<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JadwalDokterController;
use App\Http\Controllers\LogUserController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CekAdmin;
use App\Http\Middleware\CekDokter;
use App\Http\Middleware\CekPasien;
use App\Http\Controllers\Apoteker\DashboardController as ApotekerDashboardController;
use App\Http\Controllers\Apoteker\LoginController;
use App\Http\Controllers\Apoteker\PenjualanController;
use App\Http\Controllers\Apoteker\ProfileController as ApotekerProfileController;
use App\Http\Controllers\Apoteker\UbahPasswordController;
use App\Http\Controllers\Dokter\DashboardController as DokterDashboardController;
use App\Http\Controllers\Dokter\LoginController as DokterLoginController;
use App\Http\Controllers\Pasien\FaqController;
use App\Http\Controllers\Pasien\PemeriksaanController;
use App\Http\Controllers\Pasien\ProfileController;
use App\Http\Middleware\CekApoteker;
use Illuminate\Support\Facades\Route;

Route::prefix('pasien')->middleware([CekPasien::class])->group(function () {
    //Sarah
    Route::get('/', [DashboardController::class, 'index'])->name('pasien.dashboard');
    Route::get('profile', [ProfileController::class, 'index'])->name('pasien.profile.index');
    Route::post('profile', [ProfileController::class, 'update'])->name('pasien.profile.update');
    Route::get('pemeriksaan', [PemeriksaanController::class, 'index'])->name('pasien.pemeriksaan.index');
    Route::get('faq', [FaqController::class, 'index'])->name('pasien.faq.index');
    
    // Rafly
    Route::get('antrian', [AntrianController::class, 'index'])->name('pasien.antrian');
    Route::post('antrian', [AntrianController::class, 'create'])->name('pasien.antrian.create');
    Route::get('antrian/{id}', [AntrianController::class, 'show'])->name('pasien.antrian.detail');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('pasien.dashboard');

    // End Rafly
    // Azka
    Route::get('booking', [DokterController::class, 'booking'])->name('pasien.booking');
    Route::get('jadwal-dokter/{id}', [JadwalDokterController::class, 'index'])->name('pasien.jadwal.dokter');
    Route::post('booking/', [BookingController::class, 'store'])->name('pasien.booking.store');
    Route::get('wait-konfirmasi', [BookingController::class, 'waitKonfirmasi'])->name('pasien.booking.konfirmasi');
    Route::get('reminder-booking', [BookingController::class, 'reminderBooking'])->name('pasien.reminder.booking');
    Route::post('ubah-jadwal/{id}', [BookingController::class, 'pasienUbahbooking'])->name('pasien.ubah.booking');
    // End Azka
});
Route::prefix('dokter')->middleware([CekDokter::class])->group(function () {
    // Azka
    Route::get('booking', [BookingController::class, 'dokterIndex'])->name('dokter.booking');
    Route::post('booking/{id}', [BookingController::class, 'dokterUpdate'])->name('dokter.booking.update');
    // End Azka
});
Route::prefix('admin')->middleware([CekAdmin::class])->group(function () {
    // Rafly
    Route::get('antrian', [AntrianController::class, 'adminIndex'])->name('admin.antrian');
    Route::get('antrian/{id}', [AntrianController::class, 'adminShow'])->name('admin.antrian.detail');
    Route::post('antrian/{id}', [AntrianController::class, 'adminStore'])->name('admin-antrian.store');
    // End Rafly
    // Azka
    Route::get('profile', [AdminController::class, 'profileAdmin'])->name('admin-profile-dokter');
    Route::get('pasien/{id}', [UserController::class, 'adminShow'])->name('admin-profile-pasien-detail');
    Route::post('pasien/{id}', [UserController::class, 'adminUpdate'])->name('admin.update.pasien');
    Route::get('jadwal-dokter/{id}',[JadwalDokterController::class, 'adminIndex'])->name('admin.jadwal.dokter');
    Route::post('jadwal-dokter/{id}',[JadwalDokterController::class, 'adminUpdate'])->name('admin.update.jadwal.dokter');
    Route::get('detail-aktifitas/{iduser}', [LogUserController::class, 'adminIndex'])->name('admin.log.user');

});
// Route::get('/rafly/{folder}/{page}', function ($folder, $page) {
//     return view("rafly.$folder.$page");
// });
// Route::get('/{folder}/{page}', function ($folder, $page) {
//     return view("$folder.$page");
// });
// Route::get('/', function () {
//     return view('welcome');
// });

// sarah
Route::prefix('apoteker')->name('apoteker.')->group(function () {
    Route::get('/', [ApotekerDashboardController::class, 'index'])->name('dashboard');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('proses-login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout-apoteker');

    Route::middleware(CekApoteker::class)->group(function () {
        Route::get('profile', [ApotekerProfileController::class, 'index'])->name('profile.index');
        Route::post('profile', [ApotekerProfileController::class, 'update'])->name('profile.update');
        Route::get('ubah-password', [UbahPasswordController::class, 'index'])->name('ubah-password.index');
        Route::post('ubah-password', [UbahPasswordController::class, 'update'])->name('ubah-password.update');
        Route::get('profile', [ApotekerProfileController::class, 'index'])->name('profile.index');
        Route::get('penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
    });
});

// sarah
Route::prefix('dokter')->name('dokter.')->group(function () {
    Route::get('/', [DokterDashboardController::class, 'index'])->name('dashboard');
    Route::get('/login', [DokterLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [DokterLoginController::class, 'login'])->name('proses-login');
    Route::post('/logout', [DokterLoginController::class, 'logout'])->name('logout-apoteker');

    Route::middleware(CekDokter::class)->group(function () {
        Route::get('profile', [\App\Http\Controllers\Dokter\ProfileController::class, 'index'])->name('profile.index');
        Route::post('profile', [\App\Http\Controllers\Dokter\ProfileController::class, 'update'])->name('profile.update');
        Route::get('profile', [\App\Http\Controllers\Dokter\ProfileController::class, 'index'])->name('profile.index');
        Route::get('help', [\App\Http\Controllers\Dokter\HelpController::class, 'index'])->name('help.index');
        Route::get('pemeriksaan', [\App\Http\Controllers\Dokter\PemeriksaanController::class, 'index'])->name('pemeriksaan.index');
        Route::resource('jadwal', \App\Http\Controllers\Dokter\JadwalController::class);
    });
});


// Route::get('/rafly/{folder}/{page}', function ($folder, $page) {
//     return view("rafly.$folder.$page");
// });
Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/login-admin', [AdminController::class, 'showLoginForm'])->name('login-admin');
Route::post('/login-admin', [AdminController::class, 'login']);
Route::post('/logout-admin', [AdminController::class, 'logout'])->name('logout-admin');
Route::get('/login-dokter', [DokterController::class, 'showLoginForm'])->name('login-dokter');
Route::post('/login-dokter', [DokterController::class, 'login']);
Route::post('/logout-dokter', [DokterController::class, 'logout'])->name('logout-dokter');