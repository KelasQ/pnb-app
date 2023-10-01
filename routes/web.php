<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BantuanController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KlasterController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PenerimaBantuanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubBantuanController;
use App\Http\Controllers\SubKlasterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'index']);
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/', fn () => view('dashboard'));

    Route::resource('role', RoleController::class)->middleware('access:Admin');
    Route::resource('user', UserController::class)->middleware('access:Admin');

    Route::resource('penerima-bantuan', PenerimaBantuanController::class)->middleware('access:Pokja 1');

    Route::resource('karyawan', KaryawanController::class)->middleware('access:Pokja 3');
    Route::resource('klaster', KlasterController::class)->middleware('access:Admin');
    Route::resource('sub-klaster', SubKlasterController::class)->middleware('access:Admin');
    Route::resource('bantuan', BantuanController::class)->middleware('access:Admin');
    Route::resource('sub-bantuan', SubBantuanController::class)->middleware('access:Admin');
    Route::resource('layanan', LayananController::class)->middleware('access:Admin');
    Route::resource('case', CaseController::class)->middleware('access:Admin');

    Route::get('profil', [UserController::class, 'profil'])->name('profil')->middleware('auth');
    Route::get('edit-profil/{id}/edit', [UserController::class, 'editProfil'])->name('edit-profil')->middleware('auth');
    Route::post('update-profil', [UserController::class, 'updateProfil'])->name('update-profil')->middleware('auth');
    Route::get('edit-password/{id}/edit', [UserController::class, 'editPassword'])->name('edit-password')->middleware('auth');
    Route::post('update-password', [UserController::class, 'updatePassword'])->name('update-password')->middleware('auth');

    Route::get('logout', [AuthController::class, 'logout']);
});

Route::get('getDataKasus/{id}', [CaseController::class, 'getDataKasus']);
Route::get('getDataSubKlaster', [SubKlasterController::class, 'getDataSubKlaster']);
Route::get('getDataKabupaten', [PenerimaBantuanController::class, 'getDataKabupaten']);
Route::get('getDataKecamatan', [PenerimaBantuanController::class, 'getDataKecamatan']);
Route::get('getDataKelurahan', [PenerimaBantuanController::class, 'getDataKelurahan']);
