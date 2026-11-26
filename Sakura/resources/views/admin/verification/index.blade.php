@extends('layouts.admin')

@section('title', 'Verifikasi Vendor - Admin Sakura')

@section('content')
    <div class="mb-8 flex justify-between items-end">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Verifikasi Vendor</h1>
            <p class="text-slate-500 text-sm mt-1">Daftar mitra yang menunggu persetujuan dokumen.</p>
        </div>
        <div class="bg-white px-4 py-2 rounded-lg border border-slate-200 shadow-sm text-sm font-medium">
            Total Pending: <span class="text-brown font-bold">{{ $vendors->count() }}</span>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded-r-xl mb-6 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <table class="w-full text-left text-sm text-slate-600">
            <thead class="bg-slate-50 text-slate-500 font-medium border-b border-slate-200">
                <tr>
                    <th class="px-6 py-4">Nama Brand</th>
                    <th class="px-6 py-4">Pemilik / Akun</th>
                    <th class="px-6 py-4">Kontak WA</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($vendors as $vendor)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4 font-semibold text-slate-800">{{ $vendor->brand_name }}</td>
                    <td class="px-6 py-4">
                        <div class="font-medium">{{ $vendor->user->name }}</div>
                        <div class="text-xs text-slate-400">{{ $vendor->user->email }}</div>
                    </td>
                    <td class="px-6 py-4">{{ $vendor->business_whatsapp }}</td>
                    <td class="px-6 py-4 text-right">
                        <!-- Tombol untuk membuka Modal Detail -->
                        <button type="button" onclick="openModal({{ $vendor->id }})" class="bg-brown hover:bg-darkbrown text-white px-4 py-2 rounded-lg text-xs font-medium transition-colors shadow-sm">
                            Periksa Dokumen
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-slate-400">Belum ada vendor yang menunggu verifikasi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal Detail Vendor (Disembunyikan secara default) -->
    @foreach($vendors as $vendor)
    <div id="modal-{{ $vendor->id }}" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" onclick="closeModal({{ $vendor->id }})"></div>

        <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-3xl">
                
                <!-- Header Modal -->
                <div class="bg-slate-50 px-6 py-4 border-b border-slate-200 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-slate-800">Dokumen Verifikasi: {{ $vendor->brand_name }}</h3>
                    <button onclick="closeModal({{ $vendor->id }})" class="text-slate-400 hover:text-slate-600">✕</button>
                </div>

                <!-- Body Modal -->
                <div class="px-6 py-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <!-- Data Teks -->
                        <div class="space-y-4">
                            <div>
                                <p class="text-xs text-slate-500 font-medium">NIB</p>
                                <p class="text-sm font-semibold text-slate-800">{{ $vendor->nib }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 font-medium">NPWP</p>
                                <p class="text-sm font-semibold text-slate-800">{{ $vendor->npwp }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 font-medium">Instagram/TikTok</p>
                                <p class="text-sm font-semibold text-slate-800">{{ $vendor->social_media }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 font-medium">WhatsApp Bisnis</p>
                                <p class="text-sm font-semibold text-slate-800">{{ $vendor->business_whatsapp }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 font-medium">Alamat Studio</p>
                                <p class="text-sm font-semibold text-slate-800">{{ $vendor->address }}</p>
                            </div>
                        </div>

                        <!-- Dokumen File (Link ke route privat) -->
                        <div class="space-y-3">
                            <p class="text-xs text-slate-500 font-medium mb-1">File Dokumen (Klik untuk membuka)</p>
                            
                            <a href="{{ route('admin.verification.document', ['vendor' => $vendor->id, 'type' => 'ktp']) }}" target="_blank" class="flex items-center gap-3 p-3 bg-slate-50 hover:bg-slate-100 rounded-xl border border-slate-200 transition-colors">
                                <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-sm text-slate-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/></svg>
                                </div>
                                <span class="text-sm font-medium text-slate-700">Foto e-KTP</span>
                            </a>

                            <a href="{{ route('admin.verification.document', ['vendor' => $vendor->id, 'type' => 'selfie']) }}" target="_blank" class="flex items-center gap-3 p-3 bg-slate-50 hover:bg-slate-100 rounded-xl border border-slate-200 transition-colors">
                                <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-sm text-slate-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                <span class="text-sm font-medium text-slate-700">Selfie Memegang e-KTP</span>
                            </a>

                            <a href="{{ route('admin.verification.document', ['vendor' => $vendor->id, 'type' => 'office']) }}" target="_blank" class="flex items-center gap-3 p-3 bg-slate-50 hover:bg-slate-100 rounded-xl border border-slate-200 transition-colors">
                                <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-sm text-slate-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                </div>
                                <span class="text-sm font-medium text-slate-700">Foto Studio</span>
                            </a>
                        </div>
                    </div>

                    <!-- Form Reject & Tombol Approve -->
                    <div class="mt-8 pt-6 border-t border-slate-200">
                        <form action="{{ route('admin.verification.reject', $vendor->id) }}" method="POST" class="mb-4">
                            @csrf
                            <label class="text-xs font-semibold text-red-600 block mb-2">Alasan Penolakan (Wajib diisi jika menolak)</label>
                            <textarea name="rejection_reason" rows="2" class="w-full bg-red-50 border border-red-200 rounded-xl px-4 py-2 text-sm focus:ring-red-500 focus:border-red-500 placeholder-red-300" placeholder="Contoh: Foto KTP blur, mohon unggah ulang."></textarea>
                            <button type="submit" class="mt-2 bg-white text-red-600 border border-red-200 hover:bg-red-50 px-4 py-2 rounded-lg text-xs font-medium transition-colors">
                                Tolak Pengajuan
                            </button>
                        </form>

                        <form action="{{ route('admin.verification.approve', $vendor->id) }}" method="POST" class="flex justify-end">
                            @csrf
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-medium py-2.5 px-6 rounded-xl transition-all shadow-sm text-sm">
                                Setujui & Verifikasi
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection

@push('scripts')
<script>
    function openModal(id) {
        document.getElementById('modal-' + id).classList.remove('hidden');
    }
    function closeModal(id) {
        document.getElementById('modal-' + id).classList.add('hidden');
    }
</script>
@endpush