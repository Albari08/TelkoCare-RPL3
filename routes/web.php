<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\DashboardController;

// Admin routes
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard']);
    Route::resource('admins', AdminController::class);
    Route::resource('medical-records', MedicalRecordController::class);
    Route::resource('users', UserController::class);
    Route::resource('doctors', DoctorController::class);
});

// Doctor routes
Route::middleware(['auth:doctor'])->group(function () {
    Route::get('/doctor/dashboard', [DashboardController::class, 'doctorDashboard']);
    Route::get('medical-records', [MedicalRecordController::class, 'index']);
    Route::get('medical-records/{id}', [MedicalRecordController::class, 'show']);
    Route::post('medical-records', [MedicalRecordController::class, 'store']);
    Route::put('medical-records/{id}', [MedicalRecordController::class, 'update']);
});

// User routes (patients)
Route::middleware(['auth:user'])->group(function () {
    Route::get('/user/dashboard', [DashboardController::class, 'userDashboard']);
    Route::get('users/{id}', [UserController::class, 'show']);
    Route::get('medical-records/{id}', [MedicalRecordController::class, 'show']);
});
