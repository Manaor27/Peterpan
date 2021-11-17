<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/ubahdata', [MahasiswaController::class, 'ubahData']);
Route::post('/simpan/perubahan', [MahasiswaController::class, 'simpanPerubahan']);
Route::get('/upload', [MahasiswaController::class, 'uploadBerkas']);
Route::get('/simpan/berkas/{id}', [MahasiswaController::class, 'simpanBerkas']);
Route::post('/save', [MahasiswaController::class, 'save']);
Route::get('/mahasiswa/tampil/{id}', [MahasiswaController::class, 'tampil']);

Route::get('/admin/preview/{id}', [AdminController::class, 'preview']);

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
