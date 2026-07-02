<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('donor')->name('donor.')->group(function () {
    Route::get('/jadwal', [HomeController::class, 'jadwal'])->name('jadwal');
    Route::get('/daftar', [HomeController::class, 'daftar'])->name('daftar');
});

// Route untuk Halaman Profil PMI
Route::prefix('profil')->name('profil.')->group(function () {
    Route::view('/struktur', 'pages.profil.struktur')->name('struktur');
});

// Route Group: Profil PMI
Route::prefix('profil')->name('profil.')->group(function () {
    Route::view('/struktur', 'pages.profil.struktur')->name('struktur');
});

// Route : Berita
Route::get('/berita', [HomeController::class, 'berita'])->name('berita.index');
Route::get('/berita/{id}', [HomeController::class, 'showBerita'])->name('berita.show');
