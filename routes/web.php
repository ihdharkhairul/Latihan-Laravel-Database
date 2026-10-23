<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

// ===== Route Mahasiswa (modul sebelumnya) =====
Route::get('/form', [MahasiswaController::class, 'form']);
Route::post('/simpan', [MahasiswaController::class, 'simpan']);
Route::get('/daftar', [MahasiswaController::class, 'daftar']);

// ===== PUBLIK: warga kirim laporan tanpa login =====
Route::get('/lapor', [LaporanController::class, 'form'])->name('banjir.form');
Route::post('/laporan/simpan', [LaporanController::class, 'simpan'])->name('banjir.kirim');

// ===== AUTH =====
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

// ===== DILINDUNGI: khusus petugas =====
Route::middleware('auth')->group(function () {
    Route::get('/laporan', [LaporanController::class, 'daftar'])->name('banjir.daftar');
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
});
