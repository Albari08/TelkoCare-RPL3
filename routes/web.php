<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\ResepPasienController;
use App\Http\Controllers\ApotekerController;

Route::resource('resep', ResepController::class);
Route::get('/getobat', [ResepController::class, 'getObat'])->name('resep.getobat');
Route::post('/addobat', [ResepController::class, 'addObat'])->name('resep.addobat');
Route::delete('/removeobat/{id}', [ResepController::class, 'removeObat'])->name('resep.removeobat');

Route::resource('resepPasien', ResepPasienController::class);
Route::resource('apoteker', ApotekerController::class);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });


// Route::get('/dashboard/calendar', function () {
//     return view('/dashboard/calendar');
// });

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('dashboard/calendar', [CalendarController::class, 'index'])->name('calendar');