<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

// Route::get('/antrian/{folder}/{page}', function ($folder, $page) {
//     return view("antrian.$folder.$page");
// });

// Route::get('/{folder}/{page}', function ($folder, $page) {
//     return view("$folder.$page");
// });

Route::get('admin/jadwal-dokter', function () {
    return view('jadwal.jadwal-dokter');
});



Route::get('/', [AuthController::class, 'login']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/admin/jadwal', [JadwalController::class, 'index'])->name('jadwal');