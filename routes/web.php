<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\DocController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/ubahdata', [MahasiswaController::class, 'ubahData']);
Route::post('/simpan/perubahan', [MahasiswaController::class, 'simpanPerubahan']);
Route::get('/upload', [MahasiswaController::class, 'uploadBerkas']);
Route::get('/simpan/berkas/{id}', [MahasiswaController::class, 'simpanBerkas']);
Route::get('/mahasiswa/tampil/{id}', [MahasiswaController::class, 'tampil']);
Route::put('/valid/{id}', [MahasiswaController::class, 'valid']);
Route::get('/perubahan', [MahasiswaController::class, 'arsip']);

Route::put('/save/{id}', [DocController::class, 'save']);
Route::get('/mahasiswa/edit/{id}', [DocController::class, 'edit']);
Route::put('/update/{id}', [DocController::class, 'update']);

Route::get('/admin/preview/{id}', [AdminController::class, 'preview']);
Route::put('/validasi/{id}', [AdminController::class, 'simpanValidasi']);
Route::get('/admin/tampil/{id}/{id2}', [AdminController::class, 'tampil']);
Route::get('/admin/validasi/{id}', [AdminController::class, 'validasi']);
Route::get('/dataDisetujui', [AdminController::class, 'dataSetuju']);
Route::get('/dataPermohonan', [AdminController::class, 'dataAjuan']);
Route::get('/download', [AdminController::class, 'laporan']);

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/simpan', [UserController::class, 'simpan']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::put('/user/update/{id}', [UserController::class, 'update']);
Route::get('/user/delete/{id}', [UserController::class, 'delete']);

Route::get('/jenis', [JenisController::class, 'index']);
Route::get('/jenis/tambah', [JenisController::class, 'tambah']);
Route::post('/jenis/simpan', [JenisController::class, 'simpan']);
Route::get('/jenis/edit/{id}', [JenisController::class, 'edit']);
Route::put('/jenis/update/{id}', [JenisController::class, 'update']);
Route::get('/jenis/delete/{id}', [JenisController::class, 'delete']);

Auth::routes();

Route::middleware(['auth'])->group(function () {
 
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/suratMasuk', [App\Http\Controllers\HomeController::class, 'smasuk'])->name('smasuk');
    Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
 
    Route::middleware(['admin'])->group(function () {
        Route::get('admin', [AdminController::class, 'index']);
    });

    Route::middleware(['mahasiswa'])->group(function () {
        Route::get('mahasiswa', [MahasiswaController::class, 'index']);
    });
});
