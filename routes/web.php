<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BantuanController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KlasterController;
use App\Http\Controllers\LaporanAsesmen;
use App\Http\Controllers\LaporanResidensial;
use App\Http\Controllers\LaporanTerminasi;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PenerimaBantuanController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SKAController;
use App\Http\Controllers\SubBantuanController;
use App\Http\Controllers\SubKlasterController;
use App\Http\Controllers\TindakanController;
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

    Route::resource('registrasi', RegistrasiController::class)->middleware('access:Pokja 1');
    Route::get('data-bantuan/{id}', [PenerimaBantuanController::class, 'index'])->name('data-bantuan')->middleware('access:Pokja 1');
    Route::get('input-data-bantuan/{id}', [PenerimaBantuanController::class, 'create'])->name('input-data-bantuan')->middleware('access:Pokja 1');
    Route::post('store-data-bantuan', [PenerimaBantuanController::class, 'store'])->name('store-data-bantuan')->middleware('access:Pokja 1');
    Route::get('edit-data-bantuan/{id}', [PenerimaBantuanController::class, 'edit'])->name('edit-data-bantuan')->middleware('access:Pokja 1');
    Route::put('update-data-bantuan/{id}', [PenerimaBantuanController::class, 'update'])->name('update-data-bantuan')->middleware('access:Pokja 1');
    Route::get('show-data-bantuan/{id}', [PenerimaBantuanController::class, 'show'])->name('show-data-bantuan')->middleware('access:Pokja 1');
    Route::delete('destroy-data-bantuan/{id}', [PenerimaBantuanController::class, 'destroy'])->name('destroy-data-bantuan')->middleware('access:Pokja 1');

    Route::get('dokumentasi-data-bantuan/{id}', [PenerimaBantuanController::class, 'dokumentasiDataBantuan'])->name('dokumentasi-data-bantuan')->middleware('access:Pokja 1');
    Route::post('store-dokumentasi-bantuan', [PenerimaBantuanController::class, 'storeDokumentasiBantuan'])->name('store-dokumentasi-bantuan')->middleware('access:Pokja 1');
    Route::delete('destroy-dokumentasi-penerima-bantuan/{id}', [PenerimaBantuanController::class, 'destoryDokumentasiBantuan'])->name('destroy-dokumentasi-penerima-bantuan')->middleware('access:Pokja 1');

    Route::get('semua-data-bantuan', [PenerimaBantuanController::class, 'semuaDataBantuan'])->name('semua-data-bantuan')->middleware('access:Pokja 1');

    Route::resource('tindakan', TindakanController::class)->middleware('access:Pokja 2');

    Route::resource('karyawan', KaryawanController::class)->middleware('access:Pokja 3');
    Route::resource('klaster', KlasterController::class)->middleware('access:Admin');
    Route::resource('sub-klaster', SubKlasterController::class)->middleware('access:Admin');
    Route::resource('bantuan', BantuanController::class)->middleware('access:Admin');
    Route::resource('sub-bantuan', SubBantuanController::class)->middleware('access:Admin');
    Route::resource('layanan', LayananController::class)->middleware('access:Admin');
    Route::resource('case', CaseController::class)->middleware('access:Admin');

    Route::resource('ska', SKAController::class)->middleware('access:Admin');
    Route::get('dokumentasi-ska/{id}', [SKAController::class, 'dokumentasiSKA'])->name('dokumentasi-ska')->middleware('access:Admin');
    Route::post('store-dokumentasi-ska', [SKAController::class, 'storeDokumentasiSKA'])->name('store-dokumentasi-ska')->middleware('access:Admin');
    Route::delete('destroy-dokumentasi-ska/{id}', [SKAController::class, 'destroyDokumentasiSKA'])->name('destroy-dokumentasi-ska')->middleware('access:Admin');

    Route::get('profil', [UserController::class, 'profil'])->name('profil')->middleware('auth');
    Route::get('edit-profil/{id}/edit', [UserController::class, 'editProfil'])->name('edit-profil')->middleware('auth');
    Route::post('update-profil', [UserController::class, 'updateProfil'])->name('update-profil')->middleware('auth');
    Route::get('edit-password/{id}/edit', [UserController::class, 'editPassword'])->name('edit-password')->middleware('auth');
    Route::post('update-password', [UserController::class, 'updatePassword'])->name('update-password')->middleware('auth');

    Route::get('getDataKasus/{id}', [CaseController::class, 'getDataKasus']);
    Route::get('getDataSubKlaster', [SubKlasterController::class, 'getDataSubKlaster']);
    Route::post('getDataKabupaten', [RegistrasiController::class, 'getDataKabupaten']);
    Route::post('getDataKecamatan', [RegistrasiController::class, 'getDataKecamatan']);
    Route::post('getDataKelurahan', [RegistrasiController::class, 'getDataKelurahan']);

    // Laporan Asesmen
    Route::get('lap-asesmen', [LaporanAsesmen::class, 'index'])->name('lap-asesmen')->middleware('access:Pokja 1|Admin');
    Route::post('lap-asesmen-by-kota', [LaporanAsesmen::class, 'lapAsesmenByKota'])->name('lap-asesmen-by-kota')->middleware('access:Pokja 1|Admin');
    Route::post('lap-asesmen-by-kasus', [LaporanAsesmen::class, 'lapAsesmenByKasus'])->name('lap-asesmen-by-kasus')->middleware('access:Pokja 1|Admin');
    Route::post('lap-asesmen-by-klaster', [LaporanAsesmen::class, 'lapAsesmenByKlaster'])->name('lap-asesmen-by-klaster')->middleware('access:Pokja 1|Admin');
    Route::post('lap-asesmen-by-alat-bantu', [LaporanAsesmen::class, 'lapAsesmenByAlatBantu'])->name('lap-asesmen-by-alat-bantu')->middleware('access:Pokja 1|Admin');

    // Laporan Residensial
    Route::get('lap-residensial', [LaporanResidensial::class, 'index'])->name('lap-residensial')->middleware('access:Pokja 2|Admin');
    Route::post('get-lap-residensial', [LaporanResidensial::class, 'getDataLaporan'])->name('get-lap-residensial')->middleware('access:Pokja 2|Admin');
    Route::get('dokumen-residensial/{peserta_id}/{tindakan}', [LaporanResidensial::class, 'dokumenResidensial'])->name('dokumen-residensial')->middleware('access:Pokja 2|Admin');

    // Laporan Terminasi
    Route::get('lap-terminasi', [LaporanTerminasi::class, 'index'])->name('lap-terminasi')->middleware('access:Pokja 1|Pokja 2|Admin');
    Route::get('dokumen-terminasi/{id}', [LaporanTerminasi::class, 'dokumenTerminasi'])->name('dokumen-terminasi')->middleware('access:Pokja 1|Pokja 2|Admin');

    Route::get('logout', [AuthController::class, 'logout']);
});
