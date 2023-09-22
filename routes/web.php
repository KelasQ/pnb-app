<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

Route::get(RouteServiceProvider::HOME, fn () => view('dashboard'));
Route::get('login', function () {
    return view('login');
});

Route::resource('role', RoleController::class);
// Route::resource('user', UserController::class);
// Route::resource('karyawan', KaryawanController::class);
