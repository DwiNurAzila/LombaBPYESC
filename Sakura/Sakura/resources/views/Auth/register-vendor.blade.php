@extends('layouts.main')

@section('title', 'Daftar Vendor - Sakura')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 items-stretch">

        <!-- Panel Kiri -->
        <section class="relative bg-peach rounded-3xl p-6 lg:p-8 flex flex-col justify-between overflow-hidden shadow-[0_20px_50px_-12px_rgba(140,106,79,0.15)] border border-white/40">
            
            <!-- Ilustrasi Latar Dekoratif -->
            <div class="absolute -top-10 -right-10 w-64 h-64 opacity-20 pointer-events-none mix-blend-multiply">
                <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?q=80&w=1000&auto=format&fit=crop" alt="Floral Background" class="w-full h-full object-cover rounded-full blur-[2px]">
            </div>

            <div class="relative z-10">
                <div class="inline-flex items-center gap-2 bg-white/70 backdrop-blur-sm border border-white rounded-full px-4 py-1.5 text-xs text-darkbrown shadow-sm w-fit">
                    <span class="w-1.5 h-1.5 rounded-full bg-brown"></span>
                    PENDAFTARAN MITRA RESMI
                </div>

                <!-- Mengecilkan ukuran teks judul (dari text-4xl/5xl menjadi text-3xl/4xl) -->
                <h1 class="font-serif text-3xl lg:text-4xl leading-tight text-darkbrown mt-3 lg:mt-4 drop-shadow-sm">
                    Bergabung Bersama<br>Ekosistem Vendor<br>Terkurasi.
                </h1>

                <p class="mt-3 lg:mt-4 text-sm text-muted max-w-md leading-relaxed">
                    Jangkau ribuan calon pengantin yang siap merencanakan pernikahan impian dengan transparansi harga dan jadwal.
                </p>

                <!-- Gambar Utama dengan Overlay -->
                <div class="relative mt-5 rounded-2xl overflow-hidden shadow-lg border border-white/60 group">
                    <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=1000&auto=format&fit=crop" alt="Vendor Meeting" class="w-full h-40 lg:h-48 object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-darkbrown/90 to-transparent flex flex-col justify-end p-4">
                        <p class="text-[9px] font-semibold tracking-widest text-white/80 uppercase mb-1">Kurasi Bestari Vendor</p>
                        <p class="font-serif text-base lg:text-lg text-white leading-tight">Ruang Eksklusif untuk Atelier & WO Terpilih</p>
                        <div class="mt-2 flex items-center gap-2">
                            <span class="bg-white/20 backdrop-blur-md border border-white/30 text-white text-[9px] px-2 py-0.5 rounded-full flex items-center gap-1">
                                <svg class="w-3 h-3 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Terakreditasi
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Daftar Fitur (Merapatkan padding dan jarak) -->
                <div class="mt-4 space-y-2">
                    <div class="bg-white/80 backdrop-blur-sm rounded-xl p-3 flex items-center gap-3 border border-white/60 shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-8 h-8 rounded-full bg-peach flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-darkbrown">Profil & Portofolio Eksklusif</p>
                            <p class="text-[10px] text-muted">Tampilkan galeri acara nyata & sertifikasi.</p>
                        </div>
                    </div>
                    <div class="bg-white/80 backdrop-blur-sm rounded-xl p-3 flex items-center gap-3 border border-white/60 shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-8 h-8 rounded-full bg-peach flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-darkbrown">Manajemen Paket Fleksibel</p>
                            <p class="text-[10px] text-muted">Atur pricelist & custom package dengan mudah.</p>
                        </div>
                    </div>
                    <div class="bg-white/80 backdrop-blur-sm rounded-xl p-3 flex items-center gap-3 border border-white/60 shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-8 h-8 rounded-full bg-peach flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-darkbrown">Analitik Performa Bisnis</p>
                            <p class="text-[10px] text-muted">Pantau tayangan profil & tingkat konversi klien.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistik Bawah -->
            <div class="relative z-10 bg-white/60 backdrop-blur-sm rounded-xl p-3 mt-4 flex items-center justify-between border border-white/50 shadow-sm shrink-0">
                <div class="flex items-center gap-3">
                    <div class="flex -space-x-2">
                        <div class="w-7 h-7 rounded-full bg-orange-200 border-2 border-white flex items-center justify-center text-[9px] font-bold text-orange-800">AN</div>
                        <div class="w-7 h-7 rounded-full bg-blue-200 border-2 border-white flex items-center justify-center text-[9px] font-bold text-blue-800">KM</div>
                        <div class="w-7 h-7 rounded-full bg-purple-200 border-2 border-white flex items-center justify-center text-[9px] font-bold text-purple-800">LP</div>
                    </div>
                    <p class="text-[10px] text-muted leading-tight">
                        <span class="font-bold text-darkbrown text-xs">320+ Mitra WO</span><br>Terverifikasi di seluruh Indonesia.
                    </p>
                </div>
                <svg class="w-6 h-6 text-brown opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
            </div>
        </section>

        <!-- Panel Kanan (Form Registrasi Vendor) -->
        <!-- Menambahkan padding (py-12) agar form lebih ke tengah dan tidak terlalu kosong di bawah -->
        <section class="bg-white rounded-3xl p-6 lg:p-8 flex flex-col justify-center shadow-[0_20px_50px_-12px_rgba(0,0,0,0.1)] border border-gray-100 py-10 lg:py-12">
            
            <h2 class="font-serif text-2xl lg:text-3xl text-darkbrown shrink-0">Daftar Akun Mitra Vendor</h2>
            <p class="text-xs lg:text-sm text-muted mt-1 mb-6 shrink-0">Lengkapi data perwakilan bisnis Anda untuk memulai proses verifikasi.</p>

            <form method="POST" action="{{ url('/register-vendor') }}" class="space-y-4 shrink-0">
                @csrf
                
                <!-- Nama Lengkap -->
                <div>
                    <label class="text-[11px] font-semibold tracking-wider text-darkbrown uppercase">Nama Lengkap <span class="text-brown">*</span></label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <input type="text" name="name" placeholder="Contoh: Ayu Rahma" class="w-full bg-cream rounded-xl pl-9 pr-4 py-2.5 text-xs lg:text-sm outline-none focus:ring-2 focus:ring-brown/30 placeholder:text-muted/60 shadow-inner border border-transparent focus:border-brown/20 transition-all">
                    </div>
                </div>

                <!-- Jabatan -->
                <div>
                    <label class="text-[11px] font-semibold tracking-wider text-darkbrown uppercase">Jabatan <span class="text-brown">*</span></label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <input type="text" name="position" placeholder="Contoh: Owner / Founder / Manager Operasional" class="w-full bg-cream rounded-xl pl-9 pr-4 py-2.5 text-xs lg:text-sm outline-none focus:ring-2 focus:ring-brown/30 placeholder:text-muted/60 shadow-inner border border-transparent focus:border-brown/20 transition-all">
                    </div>
                </div>

                <!-- Email Bisnis -->
                <div>
                    <label class="text-[11px] font-semibold tracking-wider text-darkbrown uppercase">Email Bisnis <span class="text-brown">*</span></label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <input type="email" name="email" placeholder="nama@perusahaanwo.co.id" class="w-full bg-cream rounded-xl pl-9 pr-4 py-2.5 text-xs lg:text-sm outline-none focus:ring-2 focus:ring-brown/30 placeholder:text-muted/60 shadow-inner border border-transparent focus:border-brown/20 transition-all">
                    </div>
                </div>

                <!-- Nomor WhatsApp -->
                <div>
                    <label class="text-[11px] font-semibold tracking-wider text-darkbrown uppercase">Nomor WhatsApp <span class="text-brown">*</span></label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <input type="text" name="whatsapp" placeholder="0812 3456 7890" class="w-full bg-cream rounded-xl pl-9 pr-4 py-2.5 text-xs lg:text-sm outline-none focus:ring-2 focus:ring-brown/30 placeholder:text-muted/60 shadow-inner border border-transparent focus:border-brown/20 transition-all">
                    </div>
                    <p class="text-[9px] text-muted mt-1">Untuk verifikasi mitra & notifikasi leads cepat.</p>
                </div>

                <!-- Password & Konfirmasi (Grid) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div>
                        <label class="text-[11px] font-semibold tracking-wider text-darkbrown uppercase">Password <span class="text-brown">*</span></label>
                        <div class="relative mt-1">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </div>
                            <input type="password" name="password" placeholder="Minimal 8 karakter" class="w-full bg-cream rounded-xl pl-9 pr-10 py-2.5 text-xs lg:text-sm outline-none focus:ring-2 focus:ring-brown/30 placeholder:text-muted/60 shadow-inner border border-transparent focus:border-brown/20 transition-all">
                            <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-muted hover:text-darkbrown">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                        </div>
                    </div>
                    <div>
                        <label class="text-[11px] font-semibold tracking-wider text-darkbrown uppercase">Konfirmasi Password <span class="text-brown">*</span></label>
                        <div class="relative mt-1">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            </div>
                            <input type="password" name="password_confirmation" placeholder="Ulangi password Anda" class="w-full bg-cream rounded-xl pl-9 pr-10 py-2.5 text-xs lg:text-sm outline-none focus:ring-2 focus:ring-brown/30 placeholder:text-muted/60 shadow-inner border border-transparent focus:border-brown/20 transition-all">
                            <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-muted hover:text-darkbrown">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Syarat & Ketentuan -->
                <div class="flex items-start gap-2 pt-2">
                    <input type="checkbox" name="terms" id="terms" class="mt-0.5 rounded border-gray-300 text-brown focus:ring-brown/30">
                    <label for="terms" class="text-[10px] text-muted leading-relaxed cursor-pointer">
                        Saya menyetujui Ketentuan Kemitraan & Kebijakan Privasi TemulHati.
                    </label>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="w-full bg-brown hover:bg-darkbrown text-white font-medium py-3 lg:py-3.5 rounded-xl transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2 text-xs lg:text-sm mt-2 hover:-translate-y-0.5">
                    Daftar Sebagai Mitra Vendor →
                </button>
            </form>

            <!-- Link Masuk -->
            <p class="text-center text-xs lg:text-sm text-muted mt-5 shrink-0">
                Sudah memiliki akun mitra? <a href="{{ url('/login-vendor') }}" class="text-brown font-medium hover:underline">Masuk di sini</a>
            </p>

        </section>
    </div>
@endsection