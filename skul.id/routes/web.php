<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\AlumniSiswaController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\SertifikasiController;
use App\Models\AlumniSiswaProfile;

/**
 * ✅ Route publik (tanpa login)
 */
Route::get('/', function () {
    return view('welcome');
});

Route::middleware('prevent-back-history')->group(function () {
    Route::get('/login/alumni', function () {
        return view('login.loginAlumni');
    })->name('login.alumni');

    Route::get('/login/mitra', function () {
        return view('login.loginMitra');
    })->name('login.mitra');
});

// // Halaman login
// Route::get('/login/alumni', function () {
//     return view('login.loginAlumni');
// })->name('login.alumni');

// Route::get('/login/mitra', function () {
//     return view('login.loginMitra');
// })->name('login.mitra');

// Halaman register
Route::get('/register/mitra', [RegisteredUserController::class, 'showMitraForm'])->name('register.mitra');
Route::get('/register/alumni', [RegisteredUserController::class, 'showAlumniForm'])->name('register.alumni');
Route::post('/registrasi', [RegisteredUserController::class, 'register'])->name('register.store');

/**
 * ✅ Route setelah login, role MITRA
 */
Route::middleware(['auth', 'role:mitra'])->group(function () {
    Route::get('/mitra/addProfile', [MitraController::class, 'addProfile'])->name('mitra.addProfile');
    Route::post('/mitra/storeProfile', [MitraController::class, 'storeProfile'])->name('mitra.storeProfile');
    Route::middleware('profile')->group(function () {
        Route::get('/mitra', [MitraController::class, 'index'])->name('mitra.index');
        Route::get('/mitra/sertifikasi', [SertifikasiController::class, 'index'])->name('mitra.sertifikasi');
        Route::post('/mitra/store-sertifikasi', [SertifikasiController::class, 'store'])->name('mitra.sertifikasi.store');
        Route::put('/mitra/update-sertifikasi/{id}', [SertifikasiController::class, 'update'])->name('mitra.sertifikasi.update');
        Route::delete('/mitra/delete-sertifikasi/{id}', [SertifikasiController::class, 'destroy'])->name('mitra.sertifikasi.destroy');
        Route::get('/mitra/profile', [MitraController::class, 'profile'])->name('mitra.profile');
        Route::get('/mitra/loker', [LokerController::class, 'index'])->name('mitra.loker');
        Route::post('/mitra/store-loker', [LokerController::class, 'store'])->name('mitra.loker.store');
        Route::put('/mitra/update-loker/{id}', [LokerController::class, 'update'])->name('mitra.loker.update');
        Route::delete('/mitra/delete-loker/{id}', [LokerController::class, 'destroy'])->name('mitra.loker.destroy');
        Route::get('/mitra/pelatihan', [PelatihanController::class, 'index'])->name('mitra.pelatihan');
        Route::post('/mitra/store-pelatihan', [PelatihanController::class, 'store'])->name('mitra.pelatihan.store');
        Route::put('/mitra/update-pelatihan/{id}', [PelatihanController::class, 'update'])->name('mitra.pelatihan.update');
        Route::delete('/mitra/delete-pelatihan/{id}', [PelatihanController::class, 'destroy'])->name('mitra.pelatihan.destroy');
    });
});

/**
 * ✅ Route setelah login, role ALUMNI
 */
Route::middleware(['auth', 'role:alumnisiswa'])->group(function () {
    Route::get('/alumni-siswa/addProfile', [AlumniSiswaController::class, 'addProfile'])->name('alumni-siswa.addProfile');
    Route::post('/alumni-siswa/storeProfile', [AlumniSiswaController::class, 'storeProfile'])->name('alumni-siswa.storeProfile');
    Route::middleware('profile')->group(function () {
        Route::get('/alumni-siswa', [AlumniSiswaController::class, 'index'])->name('alumni-siswa.index');
        Route::get('/alumni-siswa/profile', [AlumniSiswaController::class, 'profile'])->name('alumni-siswa.profile');
        Route::get('/alumni-siswa/sertifikasi', [AlumniSiswaController::class, 'sertifikasi'])->name('alumni-siswa.sertifikasi');
        Route::post('/alumni-siswa/store-sertifikasi/{sertifikasi}', [DaftarController::class, 'storeDaftarSertifikasi'])->name('alumni-siswa.sertifikasi.store');
        Route::post('/alumni-siswa/store-loker/{loker}', [DaftarController::class, 'storeDaftarLoker'])->name('alumni-siswa.loker.store');
        Route::get('/alumni-siswa/loker', [AlumniSiswaController::class, 'loker'])->name('alumni-siswa.loker');
        Route::get('/alumni-siswa/pelatihan', [AlumniSiswaController::class, 'pelatihan'])->name('alumni-siswa.pelatihan');
        Route::get('/alumni-siswa/ikatan', [AlumniSiswaController::class, 'ikatan'])->name('alumni-siswa.ikatan');
        Route::get('/alumni-siswa/kuliah', [AlumniSiswaController::class, 'kuliah'])->name('alumni-siswa.kuliah');
        Route::get('/alumni-siswa/artikel', [AlumniSiswaController::class, 'artikel'])->name('alumni-siswa.artikel');
        Route::get('/alumni-siswa/ebook', [AlumniSiswaController::class, 'ebook'])->name('alumni-siswa.ebook');
        Route::get('/alumni-siswa/jelajah', [AlumniSiswaController::class, 'jelajah'])->name('alumni-siswa.jelajah');
        Route::get('/alumni-siswa/editProfile', [AlumniSiswaController::class, 'editProfile'])->name('alumni-siswa.editProfile');
        Route::put('/alumni-siswa/update-profile', [AlumniSiswaController::class, 'updateProfile'])->name('alumni-siswa.updateProfile');
    });
});

/**
 * 🔐 Auth system (login, logout, dll)
 */
require __DIR__ . '/auth.php';
