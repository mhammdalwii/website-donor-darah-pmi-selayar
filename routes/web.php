<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk verifikasi email
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

//  Link yang diklik dari dalam Email
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // Tandai email sudah terverifikasi di database
    return redirect('/')->with('success', 'Email Anda berhasil diverifikasi!');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Tombol Kirim Ulang Email Verifikasi (Resend)
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Link verifikasi telah dikirim ulang ke email Anda!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// route setelah login
Route::middleware(['auth'])->group(function () {

    // Route Utama (Beranda)
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/berita', [HomeController::class, 'berita'])->name('berita.index');
    Route::get('/berita/{id}', [HomeController::class, 'showBerita'])->name('berita.show');
    Route::get('/galeri', [HomeController::class, 'galeri'])->name('galeri.index');
    Route::get('/donor/syarat', [HomeController::class, 'syarat']);
    Route::get('/profil/visi-misi', [HomeController::class, 'visiMisi']);
    Route::view('/profil/struktur', 'pages.profil.struktur')->name('profil.struktur');

    // CONTOH: Jika Anda ingin menu "Daftar Donor" HANYA bisa diakses 
    // oleh orang yang SUDAH klik link verifikasi di emailnya, 
    //  middleware 'verified' di sini:
    Route::prefix('donor')->name('donor.')->middleware('verified')->group(function () {
        Route::get('/jadwal', [HomeController::class, 'jadwal'])->name('jadwal');
        Route::get('/daftar', [HomeController::class, 'daftar'])->name('daftar');
    });
});
