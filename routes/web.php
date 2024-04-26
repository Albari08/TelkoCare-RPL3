<?php

use Illuminate\Support\Facades\Route;
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
