<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\VendorVerificationStatus;

class EnsureVendorIsApproved
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Pastikan user adalah vendor dan punya profil vendor
        if ($user && $user->role === 'vendor' && $user->vendor) {
            // Jika status BUKAN approved, tendang ke halaman onboarding
            if ($user->vendor->verification_status !== VendorVerificationStatus::APPROVED) {
                return redirect()->route('vendor.onboarding')->with('error', 'Anda harus menyelesaikan verifikasi terlebih dahulu.');
            }
        }

        return $next($request);
    }
}