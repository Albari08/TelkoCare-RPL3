<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JadwalDokterController;
use App\Http\Controllers\LogUserController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CekAdmin;
use App\Http\Middleware\CekPasien;
use Illuminate\Support\Facades\Route;






Route::prefix('pasien')->middleware([CekPasien::class])->group(function () {
    // Rafly
    Route::get('antrian', [AntrianController::class, 'index'])->name('pasien.antrian');
    Route::post('antrian', [AntrianController::class, 'create'])->name('pasien.antrian.create');
    Route::get('antrian/{id}', [AntrianController::class, 'show'])->name('pasien.antrian.detail');
    // End Rafly
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
Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/login-admin', [AdminController::class, 'showLoginForm'])->name('login-admin');
Route::post('/login-admin', [AdminController::class, 'login']);
Route::post('/logout-admin', [AdminController::class, 'logout'])->name('logout-admin');