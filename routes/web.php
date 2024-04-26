<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\ApotekerController;

Route::get('/', function () {
    return view('Apoteker/profile');
});

Route::group(['prefix' => 'apoteker'], function () {
    Route::get('/profile', 'ApotekerController@profile')->name('apoteker.profile');
    Route::get('/profile/edit', 'ApotekerController@editProfile')->name('apoteker.profile.edit');
    Route::post('/profile/update-password', 'ApotekerController@updatePassword')->name('apoteker.profile.updatePassword');
    Route::get('/profile/barang-terjual', 'ApotekerController@barangTerjual')->name('apoteker.barangTerjual');
});
=======

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
    return view('index');
});
Route::get('/antrian/{folder}/{page}', function ($folder, $page) {
    return view("antrian.$folder.$page");
});
Route::get('/{folder}/{page}', function ($folder, $page) {
    return view("$folder.$page");
});
>>>>>>> dca01c5024df80ffa97d599cd85d9a3bc9320579
