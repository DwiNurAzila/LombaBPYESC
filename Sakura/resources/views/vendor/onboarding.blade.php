@extends('layouts.vendor')

@section('title', 'Verifikasi Mitra - Sakura Vendor')

@section('content')
    <div class="max-w-3xl mx-auto w-full">
        
        <div class="mb-8">
            <h1 class="font-serif text-3xl text-darkbrown mb-2">Verifikasi Akun Mitra</h1>
            <p class="text-muted">Lengkapi data di bawah ini untuk mendapatkan akses penuh ke fitur manajemen paket.</p>
        </div>

        <!-- Pesan Error/Alert -->
        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded-r-xl mb-6">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-r-xl mb-6">
                {{ session('error') }}
            </div>
        @endif

        <!-- Logika Tampilan Berdasarkan Status -->
        @if($vendor && $vendor->verification_status === \App\Enums\VendorVerificationStatus::PENDING)
            <div class="bg-yellow-50 border border-yellow-200 p-8 rounded-3xl text-center shadow-sm">
                <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-xl font-serif font-semibold text-yellow-800 mb-2">Menunggu Verifikasi Admin</h3>
                <p class="text-sm text-yellow-700 max-w-md mx-auto">Dokumen Anda sudah kami terima dan sedang dalam proses peninjauan. Proses ini biasanya memakan waktu 1x24 jam.</p>
                <a href="{{ route('vendor.dashboard') }}" class="inline-block mt-6 bg-yellow-600 hover:bg-yellow-700 text-white font-medium py-2 px-6 rounded-xl transition-all text-sm">
                    Kembali ke Dashboard
                </a>
            </div>

        @elseif($vendor && $vendor->verification_status === \App\Enums\VendorVerificationStatus::APPROVED)
            <div class="bg-green-50 border border-green-200 p-8 rounded-3xl text-center shadow-sm">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-xl font-serif font-semibold text-green-800 mb-2">Akun Terverifikasi</h3>
                <p class="text-sm text-green-700 max-w-md mx-auto">Selamat! Akun Anda sudah terverifikasi. Anda sekarang dapat mengakses seluruh fitur manajemen paket.</p>
            </div>

        @else
            <!-- Jika status REJECTED atau belum pernah upload, tampilkan form -->
            @if($vendor && $vendor->verification_status === \App\Enums\VendorVerificationStatus::REJECTED)
                <div class="bg-red-50 border border-red-200 p-6 rounded-2xl mb-6">
                    <div class="flex items-center gap-3 mb-2">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <h3 class="text-lg font-semibold text-red-800">Verifikasi Ditolak</h3>
                    </div>
                    <p class="text-sm text-red-700 mb-2">Alasan Penolakan: <strong>{{ $vendor->rejection_reason }}</strong></p>
                    <p class="text-xs text-red-600">Silakan perbaiki data dan unggah ulang dokumen di bawah ini.</p>
                </div>
            @endif

            <div class="bg-white rounded-3xl p-6 lg:p-8 shadow-sm border border-gray-100">
                <form method="POST" action="{{ route('vendor.onboarding.store') }}" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Dokumen Legalitas -->
                        <div>
                            <label class="text-xs font-semibold text-darkbrown block mb-1">Foto e-KTP <span class="text-red-500">*</span></label>
                            <input type="file" name="ktp_file" required class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-peach file:text-darkbrown hover:file:bg-peach/80 transition-all border border-gray-200 rounded-xl p-1.5">
                            @error('ktp_file') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-darkbrown block mb-1">Selfie Memegang e-KTP <span class="text-red-500">*</span></label>
                            <input type="file" name="selfie_ktp_file" required class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-peach file:text-darkbrown hover:file:bg-peach/80 transition-all border border-gray-200 rounded-xl p-1.5">
                            @error('selfie_ktp_file') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-darkbrown block mb-1">Foto Kantor (Depan & Dalam) <span class="text-red-500">*</span></label>
                            <input type="file" name="office_photo_file" required class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-peach file:text-darkbrown hover:file:bg-peach/80 transition-all border border-gray-200 rounded-xl p-1.5">
                            @error('office_photo_file') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                        </div>
                        
                        <!-- Data Teks -->
                        <div>
                            <label class="text-xs font-semibold text-darkbrown block mb-1">Nomor WhatsApp Bisnis <span class="text-red-500">*</span></label>
                            <input type="text" name="business_whatsapp" value="{{ old('business_whatsapp', $vendor->business_whatsapp ?? '') }}" required class="w-full bg-cream rounded-xl px-4 py-3 text-sm outline-none focus:ring-2 focus:ring-brown/30 border border-transparent focus:border-brown/20 transition-all">
                            @error('business_whatsapp') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-darkbrown block mb-1">NIB (Nomor Induk Berusaha) <span class="text-red-500">*</span></label>
                            <input type="text" name="nib" value="{{ old('nib', $vendor->nib ?? '') }}" required class="w-full bg-cream rounded-xl px-4 py-3 text-sm outline-none focus:ring-2 focus:ring-brown/30 border border-transparent focus:border-brown/20 transition-all">
                            @error('nib') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-darkbrown block mb-1">NPWP Usaha / Pribadi <span class="text-red-500">*</span></label>
                            <input type="text" name="npwp" value="{{ old('npwp', $vendor->npwp ?? '') }}" required class="w-full bg-cream rounded-xl px-4 py-3 text-sm outline-none focus:ring-2 focus:ring-brown/30 border border-transparent focus:border-brown/20 transition-all">
                            @error('npwp') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="text-xs font-semibold text-darkbrown block mb-1">Akun Instagram / TikTok Bisnis <span class="text-red-500">*</span></label>
                            <input type="text" name="social_media" value="{{ old('social_media', $vendor->social_media ?? '') }}" required placeholder="@namaakun atau link profil" class="w-full bg-cream rounded-xl px-4 py-3 text-sm outline-none focus:ring-2 focus:ring-brown/30 border border-transparent focus:border-brown/20 transition-all">
                            @error('social_media') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-100 flex justify-end">
                        <button type="submit" class="bg-brown hover:bg-darkbrown text-white font-medium py-3 px-8 rounded-xl transition-all shadow-md hover:shadow-lg text-sm">
                            Kirim Dokumen Verifikasi →
                        </button>
                    </div>
                </form>
            </div>
        @endif
    </div>
@endsection