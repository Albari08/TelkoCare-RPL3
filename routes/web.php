<?php

use Illuminate\Support\Facades\Route;

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
