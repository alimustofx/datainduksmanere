<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Livewire\Admin\VerifikasiIjazah;

/*
|--------------------------------------------------------------------------
| Alur Akses Siswa / Pendaftar (Frontend)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome'); // Halaman landing page utama
});

// Route untuk menampilkan halaman verifikasi (form multi-step)
Route::get('/verifikasi', function () {
    return view('verifikasi');
});

// Route untuk menampilkan halaman bantuan (FAQ)
Route::get('/bantuan', function () {
    return view('bantuan'); // Ini akan memanggil resources/views/bantuan.blade.php
});

// Route untuk submit form verifikasi data induk
Route::post('/verifikasi/submit', [StudentController::class, 'store'])->name('verifikasi.submit');

// Route untuk hit API Pihak Ketiga (Proxy dari Backend)
Route::get('/check-npsn', [StudentController::class, 'checkNpsn'])->name('check.npsn');
Route::get('/api-proxy/kodepos', [StudentController::class, 'checkPostalCode']);


/*
|--------------------------------------------------------------------------
| Alur Autentikasi Admin (Sesuai Tombol Landing Page)
|--------------------------------------------------------------------------
*/

// 1. Jika admin BELUM login, mereka bisa akses rute ini
Route::middleware('guest:admin')->group(function() {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.proses');
});

// 2. Jika admin SUDAH login, mereka masuk ke area dashboard internal
Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function() {
    
    // Alamatnya akan menjadi: website-anda.com/admin/dashboard
    Route::get('/dashboard', \App\Livewire\Admin\Dashboard::class)->name('dashboard');
    
    /**
     * FIXED: ROUTE DOWNLOAD PRIVATE FILE DILETAKKAN DI SINI
     * URL Akses: website-anda.com/admin/download-dokumen/{id}/{jenis_berkas}
     * Nama Route: admin.download.berkas
     */
    Route::get('/download-dokumen/{id}/{jenis_berkas}', [StudentController::class, 'downloadPrivateFile'])->name('download.berkas');

    // Proses Keluar Sistem
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| Alur Verifikasi Ijazah (Sesuai Tombol Landing Page)
|--------------------------------------------------------------------------
*/
Route::get('/verifikasi-ijazah', VerifikasiIjazah::class);