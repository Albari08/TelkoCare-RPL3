<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ResepApotekerController;

Route::resource('resepApoteker', ResepApotekerController::class);
Route::put('resepApoteker/{id}/confirm', [ResepApotekerController::class, 'confirm'])->name('resepApoteker.confirm');
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });


// Route::get('/dashboard/calendar', function () {
//     return view('/dashboard/calendar');
// });

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('dashboard/calendar', [CalendarController::class, 'index'])->name('calendar');