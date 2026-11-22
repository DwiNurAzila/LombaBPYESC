<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Rute Redirect Halaman Utama (Mencegah Error 404)
Route::get('/', function () {
    return redirect()->route('login');
});

// ==========================================
// RUTE AUTENTIKASI (Hanya bisa diakses tamu)
// ==========================================
// Mengganti 'guest' menjadi 'redirect.auth'
Route::middleware(['redirect.auth', 'prevent-back'])->group(function () {
    // --- Pelanggan (Pengantin) ---
    Route::get('/login', [AuthController::class, 'showLoginPelanggan'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPelanggan']);
    
    Route::get('/register', [AuthController::class, 'showRegisterPelanggan'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPelanggan']);

    // --- Vendor & Admin ---
    Route::get('/login-vendor', [AuthController::class, 'showLoginVendor'])->name('login.vendor');
    Route::post('/login-vendor', [AuthController::class, 'loginVendor']);
    
    Route::get('/register-vendor', [AuthController::class, 'showRegisterVendor'])->name('register.vendor');
    Route::post('/register-vendor', [AuthController::class, 'registerVendor']);
});

// ==========================================
// RUTE DASHBOARD & LOGOUT (Hanya untuk user login)
// ==========================================
Route::middleware('auth')->group(function () {
    
    // Rute Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard Pelanggan
    Route::get('/dashboard', function () {
        return view('pelanggan.dashboard');
    })->name('pelanggan.dashboard');

    // Dashboard Vendor
    Route::get('/vendor/dashboard', function () {
        return view('vendor.dashboard');
    })->name('vendor.dashboard');

    // Dashboard Admin
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});