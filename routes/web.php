<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('donor')->name('donor.')->group(function () {
    Route::view('/jadwal', 'pages.donor.jadwal')->name('jadwal');
    Route::view('/daftar', 'pages.donor.daftar')->name('daftar');
});

// Route untuk Halaman Profil PMI
Route::prefix('profil')->name('profil.')->group(function () {
    Route::view('/struktur', 'pages.profil.struktur')->name('struktur');
});

// Route Group: Profil PMI
Route::prefix('profil')->name('profil.')->group(function () {
    Route::view('/struktur', 'pages.profil.struktur')->name('struktur');
});

// Route Baru: Berita
Route::view('/berita', 'pages.berita.index')->name('berita.index');
