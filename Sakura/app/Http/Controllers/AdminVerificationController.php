<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Enums\VendorVerificationStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminVerificationController extends Controller
{
    public function index()
    {
        // Ambil semua vendor yang statusnya pending
        $vendors = Vendor::where('verification_status', VendorVerificationStatus::PENDING)->with('user')->get();
        return view('admin.verification.index', compact('vendors'));
    }

    public function show(Vendor $vendor)
    {
        // Menampilkan detail dokumen vendor
        return view('admin.verification.show', compact('vendor'));
    }

    public function approve(Vendor $vendor)
    {
        $vendor->update([
            'verification_status' => VendorVerificationStatus::APPROVED,
            'rejection_reason' => null,
        ]);

        return back()->with('success', 'Vendor berhasil disetujui.');
    }

    public function reject(Request $request, Vendor $vendor)
    {
        $request->validate([
            'rejection_reason' => 'required|string|max:500',
        ]);

        $vendor->update([
            'verification_status' => VendorVerificationStatus::REJECTED,
            'rejection_reason' => $request->rejection_reason,
        ]);

        return back()->with('success', 'Vendor ditolak dengan alasan yang diberikan.');
    }

    public function viewDocument(Vendor $vendor, string $type)
    {
        // Proteksi file privat: Hanya admin yang bisa akses
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $path = match($type) {
            'ktp' => $vendor->ktp_file,
            'selfie' => $vendor->selfie_ktp_file,
            'office' => $vendor->office_photo_file,
            default => null,
        };

        if (!$path || !Storage::disk('local')->exists($path)) {
            abort(404, 'File tidak ditemukan.');
        }

        return Storage::disk('local')->response($path);
    }
}