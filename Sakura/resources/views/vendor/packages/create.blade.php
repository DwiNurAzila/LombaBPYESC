@extends('layouts.vendor')

@section('title', 'Tambah Paket - Sakura Vendor')

@section('content')
    <div class="max-w-3xl mx-auto w-full">
        <div class="mb-6">
            <a href="{{ route('vendor.packages.index') }}" class="text-xs text-muted hover:text-brown flex items-center gap-1 mb-2 transition-colors">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Daftar Paket
            </a>
            <h1 class="font-serif text-2xl text-darkbrown">Tambah Paket Baru</h1>
            <p class="text-sm text-muted mt-1">Lengkapi informasi paket layanan Anda di bawah ini.</p>
        </div>

        <div class="bg-white rounded-3xl p-6 lg:p-8 shadow-sm border border-gray-100">
            <form action="{{ route('vendor.packages.store') }}" method="POST" class="space-y-5">
                @csrf
                
                <!-- Nama & Deskripsi -->
                <div>
                    <label class="text-xs font-semibold text-darkbrown block mb-1">Nama Paket <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Paket Silver Akad + Resepsi" class="w-full bg-cream rounded-xl px-4 py-3 text-sm outline-none focus:ring-2 focus:ring-brown/30 border border-transparent focus:border-brown/20 transition-all">
                    @error('name') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="text-xs font-semibold text-darkbrown block mb-1">Deskripsi Paket <span class="text-red-500">*</span></label>
                    <textarea name="description" rows="3" required placeholder="Jelaskan detail fasilitas dan keunggulan paket ini..." class="w-full bg-cream rounded-xl px-4 py-3 text-sm outline-none focus:ring-2 focus:ring-brown/30 border border-transparent focus:border-brown/20 transition-all">{{ old('description') }}</textarea>
                    @error('description') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                </div>

                <!-- Grid: Harga, Kapasitas, Durasi, Lokasi -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="text-xs font-semibold text-darkbrown block mb-1">Harga Dasar (Rp) <span class="text-red-500">*</span></label>
                        <input type="number" name="base_price" value="{{ old('base_price') }}" required min="0" placeholder="Contoh: 15000000" class="w-full bg-cream rounded-xl px-4 py-3 text-sm outline-none focus:ring-2 focus:ring-brown/30 border border-transparent focus:border-brown/20 transition-all">
                        @error('base_price') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-darkbrown block mb-1">Kapasitas Tamu <span class="text-red-500">*</span></label>
                        <input type="number" name="guest_capacity" value="{{ old('guest_capacity') }}" required min="1" placeholder="Contoh: 500" class="w-full bg-cream rounded-xl px-4 py-3 text-sm outline-none focus:ring-2 focus:ring-brown/30 border border-transparent focus:border-brown/20 transition-all">
                        @error('guest_capacity') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-darkbrown block mb-1">Durasi Layanan (Jam) <span class="text-red-500">*</span></label>
                        <input type="number" name="duration_hours" value="{{ old('duration_hours') }}" required min="1" placeholder="Contoh: 6" class="w-full bg-cream rounded-xl px-4 py-3 text-sm outline-none focus:ring-2 focus:ring-brown/30 border border-transparent focus:border-brown/20 transition-all">
                        @error('duration_hours') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-darkbrown block mb-1">Lokasi Utama <span class="text-red-500">*</span></label>
                        <input type="text" name="location" value="{{ old('location') }}" required placeholder="Contoh: Jakarta Selatan" class="w-full bg-cream rounded-xl px-4 py-3 text-sm outline-none focus:ring-2 focus:ring-brown/30 border border-transparent focus:border-brown/20 transition-all">
                        @error('location') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Checkbox Fasilitas -->
                <div class="pt-2">
                    <label class="text-xs font-semibold text-darkbrown block mb-3">Fasilitas Termasuk</label>
                    <div class="flex flex-col md:flex-row gap-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="has_catering" value="1" {{ old('has_catering') ? 'checked' : '' }} class="rounded border-gray-300 text-brown focus:ring-brown/30 w-4 h-4">
                            <span class="text-sm text-gray-700">Katering</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="has_decoration" value="1" {{ old('has_decoration') ? 'checked' : '' }} class="rounded border-gray-300 text-brown focus:ring-brown/30 w-4 h-4">
                            <span class="text-sm text-gray-700">Dekorasi</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="has_documentation" value="1" {{ old('has_documentation') ? 'checked' : '' }} class="rounded border-gray-300 text-brown focus:ring-brown/30 w-4 h-4">
                            <span class="text-sm text-gray-700">Dokumentasi</span>
                        </label>
                    </div>
                </div>

                <div class="pt-4 border-t border-gray-100 flex justify-end">
                    <button type="submit" class="bg-brown hover:bg-darkbrown text-white font-medium py-3 px-8 rounded-xl transition-all shadow-md hover:shadow-lg text-sm">
                        Simpan Paket
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection