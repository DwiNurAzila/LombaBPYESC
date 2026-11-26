@extends('layouts.vendor')

@section('title', 'Kelola Paket - Sakura Vendor')

@section('content')
    <div class="mb-6 flex flex-col md:flex-row md:justify-between md:items-end gap-4">
        <div>
            <h1 class="font-serif text-2xl text-darkbrown">Daftar Paket Layanan</h1>
            <p class="text-sm text-muted mt-1">Kelola semua paket pernikahan yang Anda tawarkan.</p>
        </div>
        <a href="{{ route('vendor.packages.create') }}" class="bg-brown hover:bg-darkbrown text-white text-sm font-medium py-2.5 px-5 rounded-xl transition-all shadow-sm flex items-center justify-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Paket
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded-r-xl mb-6 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse($packages as $package)
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition-shadow">
            <div>
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <h3 class="font-serif text-lg text-darkbrown">{{ $package->name }}</h3>
                        <p class="text-[10px] text-muted tracking-wider uppercase">{{ $package->location }}</p>
                    </div>
                    <div class="bg-peach text-brown text-[10px] font-bold px-2 py-1 rounded-md">
                        {{ $package->duration_hours }} Jam
                    </div>
                </div>
                
                <p class="text-xs text-muted line-clamp-2 mb-4">{{ $package->description }}</p>
                
                <div class="space-y-2 mb-4">
                    <div class="flex items-center gap-2 text-xs text-gray-600">
                        <svg class="w-3.5 h-3.5 text-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        Kapasitas: {{ $package->guest_capacity }} Tamu
                    </div>
                    <div class="flex items-center gap-2 text-xs text-gray-600">
                        <svg class="w-3.5 h-3.5 text-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Rp {{ number_format($package->base_price, 0, ',', '.') }}
                    </div>
                </div>

                <div class="flex flex-wrap gap-1.5 mb-4">
                    @if($package->has_catering) <span class="bg-green-50 text-green-700 text-[9px] px-2 py-0.5 rounded border border-green-200">Katering</span> @endif
                    @if($package->has_decoration) <span class="bg-blue-50 text-blue-700 text-[9px] px-2 py-0.5 rounded border border-blue-200">Dekorasi</span> @endif
                    @if($package->has_documentation) <span class="bg-purple-50 text-purple-700 text-[9px] px-2 py-0.5 rounded border border-purple-200">Dokumentasi</span> @endif
                </div>
            </div>

            <div class="pt-3 border-t border-gray-100 flex gap-2">
                <a href="{{ route('vendor.packages.edit', $package->id) }}" class="flex-1 bg-white border border-gray-200 hover:border-brown text-darkbrown text-xs font-medium py-2 rounded-lg text-center transition-colors">
                    Edit
                </a>
                <form action="{{ route('vendor.packages.destroy', $package->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-white border border-red-200 hover:border-red-500 hover:text-red-600 text-red-500 text-xs font-medium py-2 rounded-lg text-center transition-colors">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="col-span-full bg-white rounded-2xl p-8 text-center border border-dashed border-gray-300">
            <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            </div>
            <h3 class="text-lg font-semibold text-darkbrown mb-1">Belum Ada Paket</h3>
            <p class="text-sm text-muted">Anda belum menambahkan paket pernikahan. Klik tombol di atas untuk mulai menambahkan.</p>
        </div>
        @endforelse
    </div>
@endsection