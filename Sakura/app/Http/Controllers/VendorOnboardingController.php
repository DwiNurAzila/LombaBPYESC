<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Enums\VendorVerificationStatus;

class VendorOnboardingController extends Controller
{
    public function index()
    {
        $vendor = auth()->user()->vendor;
        
        // Jika sudah approved, langsung ke dashboard
        if ($vendor && $vendor->verification_status === VendorVerificationStatus::APPROVED) {
            return redirect()->route('vendor.dashboard');
        }

        return view('vendor.onboarding', compact('vendor'));
    }

    public function store(Request $request)
    {
        $vendor = auth()->user()->vendor;

        // PENGAMAN: Cegah upload ganda jika status masih PENDING atau sudah APPROVED
        if ($vendor && in_array($vendor->verification_status, [VendorVerificationStatus::PENDING, VendorVerificationStatus::APPROVED])) {
            return redirect()->route('vendor.onboarding')->with('error', 'Anda tidak dapat mengirim ulang dokumen saat proses verifikasi sedang berjalan atau sudah disetujui.');
        }

        $request->validate([
            'ktp_file' => 'required|mimes:jpg,jpeg,png,pdf|max:5120',
            'selfie_ktp_file' => 'required|mimes:jpg,jpeg,png|max:5120',
            'office_photo_file' => 'required|mimes:jpg,jpeg,png|max:5120',
            'business_whatsapp' => 'required|string|max:20',
            'nib' => 'required|string|max:50',
            'npwp' => 'required|string|max:50',
            'social_media' => 'required|string|max:255',
        ]);

        // Simpan file ke storage/app/private/vendor_documents/{user_id}
        $path = "vendor_documents/" . auth()->id();
        
        $ktpPath = $request->file('ktp_file')->store($path, 'local');
        $selfiePath = $request->file('selfie_ktp_file')->store($path, 'local');
        $officePath = $request->file('office_photo_file')->store($path, 'local');

        // Update data vendor (hanya jika status belum ada atau rejected)
        $vendor->update([
            'ktp_file' => $ktpPath,
            'selfie_ktp_file' => $selfiePath,
            'office_photo_file' => $officePath,
            'business_whatsapp' => $request->business_whatsapp,
            'nib' => $request->nib,
            'npwp' => $request->npwp,
            'social_media' => $request->social_media,
            'verification_status' => VendorVerificationStatus::PENDING,
            'rejection_reason' => null,
        ]);

        return redirect()->route('vendor.dashboard')->with('success', 'Dokumen berhasil diunggah. Mohon tunggu verifikasi dari Admin.');
    }
}