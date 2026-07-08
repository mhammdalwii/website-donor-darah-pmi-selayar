<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // Route Utama (Beranda)
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

    // route : galeri
    Route::get('/galeri', [HomeController::class, 'galeri'])->name('galeri.index');
    Route::get('/donor/syarat', [HomeController::class, 'syarat']);
    Route::get('/profil/visi-misi', [HomeController::class, 'visiMisi']);
});
