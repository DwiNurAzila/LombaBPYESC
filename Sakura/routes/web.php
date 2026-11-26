<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VendorOnboardingController;
use App\Http\Controllers\AdminVerificationController;
use App\Http\Controllers\VendorPackageController;

// Redirect halaman utama ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// ==========================================
// RUTE AUTENTIKASI (Guest)
// ==========================================
Route::middleware(['redirect.auth', 'prevent-back'])->group(function () {
    // Pelanggan (Pengantin)
    Route::get('/login', [AuthController::class, 'showLoginPelanggan'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPelanggan']);
    Route::get('/register', [AuthController::class, 'showRegisterPelanggan'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPelanggan']);

    // Vendor & Admin
    Route::get('/login-vendor', [AuthController::class, 'showLoginVendor'])->name('login.vendor');
    Route::post('/login-vendor', [AuthController::class, 'loginVendor']);
    Route::get('/register-vendor', [AuthController::class, 'showRegisterVendor'])->name('register.vendor');
    Route::post('/register-vendor', [AuthController::class, 'registerVendor']);
});

// ==========================================
// RUTE KHUSUS VENDOR
// ==========================================
Route::middleware(['auth', 'role:vendor'])->prefix('vendor')->name('vendor.')->group(function () {
    // Dashboard Vendor
    Route::get('/dashboard', function () {
        return view('vendor.dashboard');
    })->name('dashboard');

    // Onboarding (Verifikasi Dokumen)
    Route::get('/onboarding', [VendorOnboardingController::class, 'index'])->name('onboarding');
    Route::post('/onboarding', [VendorOnboardingController::class, 'store'])->name('onboarding.store');
    
    // CRUD Paket (Hanya bisa diakses jika vendor sudah APPROVED)
    Route::middleware('vendor.approved')->group(function () {
        Route::get('/packages', [VendorPackageController::class, 'index'])->name('packages.index');
        Route::get('/packages/create', [VendorPackageController::class, 'create'])->name('packages.create');
        Route::post('/packages', [VendorPackageController::class, 'store'])->name('packages.store');
        Route::get('/packages/{package}/edit', [VendorPackageController::class, 'edit'])->name('packages.edit');
        Route::put('/packages/{package}', [VendorPackageController::class, 'update'])->name('packages.update');
        Route::delete('/packages/{package}', [VendorPackageController::class, 'destroy'])->name('packages.destroy');
    });
});

// ==========================================
// RUTE KHUSUS ADMIN
// ==========================================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Verifikasi Vendor
    Route::get('/verification', [AdminVerificationController::class, 'index'])->name('verification.index');
    Route::get('/verification/{vendor}', [AdminVerificationController::class, 'show'])->name('verification.show');
    Route::post('/verification/{vendor}/approve', [AdminVerificationController::class, 'approve'])->name('verification.approve');
    Route::post('/verification/{vendor}/reject', [AdminVerificationController::class, 'reject'])->name('verification.reject');
    
    // Route untuk menampilkan file privat (KTP, Selfie, dll)
    Route::get('/verification/{vendor}/document/{type}', [AdminVerificationController::class, 'viewDocument'])->name('verification.document');
});

// ==========================================
// RUTE UMUM (Untuk User Login / Logout)
// ==========================================
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard Pelanggan (Pengantin)
    Route::get('/dashboard', function () {
        return view('pelanggan.dashboard');
    })->name('pelanggan.dashboard');
});