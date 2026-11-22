<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // ==========================================
    // BAGIAN PELANGGAN (PENGANTIN)
    // ==========================================

    public function showLoginPelanggan()
    {
        return view('Auth.login');
    }

    public function loginPelanggan(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'whatsapp';

        $credentials = [
            $fieldType => $request->login,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();

            if (Auth::user()->role !== 'pengantin') {
                Auth::logout();
                throw ValidationException::withMessages([
                    'login' => 'Akun ini bukan akun calon pengantin. Silakan gunakan portal yang sesuai.',
                ]);
            }

            return redirect()->intended(route('pelanggan.dashboard'));
        }

        throw ValidationException::withMessages([
            'login' => 'Email/No. WhatsApp atau password salah.',
        ]);
    }

    public function showRegisterPelanggan()
    {
        return view('Auth.register');
    }

    public function registerPelanggan(Request $request)
    {
        $request->validate([
            'names' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'whatsapp' => 'required|string|max:20',
            'event_date' => 'nullable|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->names, 
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'couple_name' => $request->names,
            'event_date' => $request->event_date,
            'password' => Hash::make($request->password),
            'role' => 'pengantin',
        ]);

        Auth::login($user);

        return redirect()->route('pelanggan.dashboard');
    }

    // ==========================================
    // BAGIAN VENDOR WO & ADMIN
    // ==========================================

    public function showLoginVendor()
    {
        return view('Auth.login-vendor');
    }

    public function loginVendor(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'vendor') {
                return redirect()->intended(route('vendor.dashboard'));
            } elseif (Auth::user()->role === 'admin') {
                return redirect()->intended(route('admin.dashboard'));
            }

            Auth::logout();
            throw ValidationException::withMessages([
                'email' => 'Akun ini bukan akun vendor/admin. Silakan gunakan portal pelanggan.',
            ]);
        }

        throw ValidationException::withMessages([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function showRegisterVendor()
    {
        return view('Auth.register-vendor');
    }

    public function registerVendor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'whatsapp' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'position' => $request->position,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'password' => Hash::make($request->password),
            'role' => 'vendor',
        ]);

        Auth::login($user);

        return redirect()->route('vendor.dashboard');
    }

    // ==========================================
    // LOGOUT (DIPERBAIKI)
    // ==========================================
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Diarahkan ke halaman login, bukan ke root '/'
        return redirect()->route('login');
    }
}