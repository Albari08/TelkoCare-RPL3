<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\DoctorLoginController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MedicalRecordController;

// Default route
Route::get('/', function () {
    return redirect()->route('user.dashboard');
});

// Admin routes
Route::middleware(['auth.admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::resource('admins', AdminController::class);
    Route::resource('medical-records', MedicalRecordController::class);
    Route::resource('users', UserController::class);
    Route::resource('doctors', DoctorController::class);
});

// Doctor routes
Route::middleware(['auth.doctor'])->group(function () {
    Route::get('/doctor/dashboard', [DashboardController::class, 'doctorDashboard'])->name('doctor.dashboard');
    Route::get('medical-records', [MedicalRecordController::class, 'index']);
    Route::get('medical-records/{id}', [MedicalRecordController::class, 'show']);
    Route::post('medical-records', [MedicalRecordController::class, 'store']);
    Route::put('medical-records/{id}', [MedicalRecordController::class, 'update']);
});

// User routes (patients)
Route::middleware(['auth.user'])->group(function () {
    Route::get('/user/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('users/{id}', [UserController::class, 'show']);
    Route::get('medical-records/{id}', [MedicalRecordController::class, 'show']);
});

// Login routes for admins
Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// Login routes for doctors
Route::get('doctor/login', [DoctorLoginController::class, 'showLoginForm'])->name('doctor.login');
Route::post('doctor/login', [DoctorLoginController::class, 'login'])->name('doctor.login.submit');
Route::post('doctor/logout', [DoctorLoginController::class, 'logout'])->name('doctor.logout');

// Login routes for users
Route::get('user/login', [UserLoginController::class, 'showLoginForm'])->name('user.login');
Route::post('user/login', [UserLoginController::class, 'login'])->name('user.login.submit');
Route::post('user/logout', [UserLoginController::class, 'logout'])->name('user.logout');
