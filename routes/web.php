<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', [MahasiswaController::class, 'form']);
Route::post('/simpan', [MahasiswaController::class, 'simpan']);
Route::get('/daftar', [MahasiswaController::class, 'daftar']);

Route::get('/lapor', [LaporanController::class, 'form'])->name('banjir.form');
Route::post('/laporan/simpan', [LaporanController::class, 'simpan'])->name('banjir.kirim');
Route::get('/laporan', [LaporanController::class, 'daftar'])->name('banjir.daftar');