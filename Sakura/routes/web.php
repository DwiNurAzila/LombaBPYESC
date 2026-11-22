<?php

use Illuminate\Support\Facades\Route;

// Halaman Login Pengantin
Route::get('/login', function () {
    return view('Auth.login');
})->name('login');

// Halaman Registrasi Pengantin
Route::get('/register', function () {
    return view('Auth.register');
})->name('register');

// Halaman Login Vendor
Route::get('/login-vendor', function () {
    return view('Auth.login-vendor');
})->name('login-vendor');

// Halaman Registrasi Vendor
Route::get('/register-vendor', function () {
    return view('Auth.register-vendor');
})->name('register-vendor');