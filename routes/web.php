<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BantuanController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KlasterController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubBantuanController;
use App\Http\Controllers\SubKlasterController;
use App\Http\Controllers\UserController;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'index']);
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/', fn () => view('dashboard'));

    Route::resource('role', RoleController::class)->middleware('adminAccess:Admin');
    Route::resource('user', UserController::class)->middleware('adminAccess:Admin');

    Route::resource('karyawan', KaryawanController::class)->middleware('adminAccess:Pokja 3');
    Route::resource('klaster', KlasterController::class)->middleware('adminAccess:Admin');
    Route::resource('sub-klaster', SubKlasterController::class)->middleware('adminAccess:Admin');
    Route::resource('bantuan', BantuanController::class)->middleware('adminAccess:Admin');
    Route::resource('sub-bantuan', SubBantuanController::class)->middleware('adminAccess:Admin');
    Route::resource('layanan', LayananController::class)->middleware('adminAccess:Admin');
    Route::resource('case', CaseController::class)->middleware('adminAccess:Admin');

    Route::get('logout', [AuthController::class, 'logout']);
});
