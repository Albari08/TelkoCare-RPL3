<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD

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
=======
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CalendarController;
>>>>>>> 1b42c082574ea02bfddf49eb0413feacb40a2cac

Route::get('/', function () {
    return view('welcome');
});
<<<<<<< HEAD
=======

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });


// Route::get('/dashboard/calendar', function () {
//     return view('/dashboard/calendar');
// });

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('dashboard/calendar', [CalendarController::class, 'index'])->name('calendar');
>>>>>>> 1b42c082574ea02bfddf49eb0413feacb40a2cac
