<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\AlumniSiswaController;
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
        // Route::get('/mitra/profile', [MitraController::class, 'profile'])->name('mitra.profile');
        Route::get('/mitra/loker', [MitraController::class, 'loker'])->name('mitra.loker');
        Route::get('/mitra/pelatihan', [MitraController::class, 'pelatihan'])->name('mitra.pelatihan');
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
