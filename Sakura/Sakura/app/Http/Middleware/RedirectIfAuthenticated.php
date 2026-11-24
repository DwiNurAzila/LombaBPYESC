<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login
        if (Auth::check()) {
            $role = Auth::user()->role;

            // Arahkan ke dashboard yang sesuai berdasarkan role
            if ($role === 'vendor') {
                return redirect()->route('vendor.dashboard');
            } elseif ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('pelanggan.dashboard');
            }
        }

        return $next($request);
    }
}