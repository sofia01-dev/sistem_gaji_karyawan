<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-proses', [AuthController::class, 'loginProses']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register-proses', [AuthController::class, 'registerProses']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::resource('departemen', DepartemenController::class);

    Route::resource('jabatan', JabatanController::class);

    Route::resource('karyawan', KaryawanController::class);

    Route::resource('absensi', AbsensiController::class);

    Route::resource('lembur', LemburController::class);

    Route::resource('gaji', GajiController::class);

    Route::get('/get-karyawan/{id}/{bulan}/{tahun}',[GajiController::class, 'getKaryawan']);
});