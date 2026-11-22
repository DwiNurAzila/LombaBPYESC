@extends('layouts.main')

@section('title', 'Masuk Vendor - Sakura')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8">

        <!-- Panel Kiri -->
        <section class="relative bg-peach rounded-3xl p-6 lg:p-8 flex flex-col justify-between min-h-[600px] overflow-hidden shadow-[0_20px_50px_-12px_rgba(140,106,79,0.15)] border border-white/40">
            
            <!-- Elemen Ilustrasi Latar (Tambahan) -->
            <div class="absolute -top-10 -right-10 w-64 h-64 opacity-20 pointer-events-none mix-blend-multiply">
                <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?q=80&w=1000&auto=format&fit=crop" alt="Wedding Setup" class="w-full h-full object-cover rounded-full blur-[2px]">
            </div>
            <div class="absolute -bottom-20 -left-10 w-80 h-80 opacity-20 pointer-events-none mix-blend-multiply">
                <img src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?q=80&w=1000&auto=format&fit=crop" alt="Wedding Decoration" class="w-full h-full object-cover rounded-full blur-[2px]">
            </div>

            <div class="relative z-10">
                <div class="inline-flex items-center gap-2 bg-white/70 backdrop-blur-sm border border-white rounded-full px-4 py-1.5 text-xs text-darkbrown shadow-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-brown"></span>
                    PORTAL MITRA VENDOR WO
                </div>

                <h1 class="font-serif text-4xl lg:text-5xl leading-tight text-darkbrown mt-4 lg:mt-6 drop-shadow-sm">
                    Kelola Bisnis Wedding<br>Organizer Lebih<br>Terukur.
                </h1>

                <p class="mt-4 lg:mt-6 text-sm text-muted max-w-md leading-relaxed">
                    Akses dasbor leads calon pengantin, kalender ketersediaan real-time, dan manajemen paket layanan dalam satu ruang kerja.
                </p>

                <div class="grid grid-cols-3 gap-3 mt-6 lg:mt-8">
                    <!-- Card 1 -->
                    <div class="bg-white rounded-2xl p-3 lg:p-4 border border-white/60 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="w-8 h-8 rounded-full bg-peach flex items-center justify-center mb-2 lg:mb-3 shadow-inner">
                            <svg class="w-4 h-4 text-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <p class="text-[11px] lg:text-xs font-semibold text-darkbrown">Leads Terkurasi</p>
                        <p class="text-[9px] lg:text-[10px] text-muted mt-1 leading-relaxed">Calon pengantin dengan estimasi budget jelas.</p>
                    </div>
                    <!-- Card 2 -->
                    <div class="bg-white rounded-2xl p-3 lg:p-4 border border-white/60 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="w-8 h-8 rounded-full bg-peach flex items-center justify-center mb-2 lg:mb-3 shadow-inner">
                            <svg class="w-4 h-4 text-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <p class="text-[11px] lg:text-xs font-semibold text-darkbrown">Kalender Real-time</p>
                        <p class="text-[9px] lg:text-[10px] text-muted mt-1 leading-relaxed">Sinkronisasi jadwal acara tanpa bentrok.</p>
                    </div>
                    <!-- Card 3 -->
                    <div class="bg-white rounded-2xl p-3 lg:p-4 border border-white/60 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="w-8 h-8 rounded-full bg-peach flex items-center justify-center mb-2 lg:mb-3 shadow-inner">
                            <svg class="w-4 h-4 text-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <p class="text-[11px] lg:text-xs font-semibold text-darkbrown">Escrow Aman</p>
                        <p class="text-[9px] lg:text-[10px] text-muted mt-1 leading-relaxed">Pencairan dana bertahap & transparan.</p>
                    </div>
                </div>
            </div>

            <!-- Testimoni -->
            <div class="relative z-10 bg-white/60 backdrop-blur-sm rounded-2xl p-4 lg:p-5 mt-6 flex gap-3 lg:gap-4 items-start shadow-lg border border-white shrink-0">
                <div class="w-10 h-10 lg:w-12 lg:h-12 rounded-lg overflow-hidden flex-shrink-0 shadow-md">
                    <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?q=80&w=200&auto=format&fit=crop" alt="Vendor" class="w-full h-full object-cover">
                </div>
                <div>
                    <p class="font-serif italic text-xs lg:text-sm text-darkbrown leading-snug">"Sejak bergabung di TemulHati, rasio konversi konsultasi kami meningkat signifikan dengan calon pengantin yang sudah siap secara anggaran."</p>
                    <p class="text-[9px] lg:text-[10px] text-muted mt-2">Sekar Jagad Wedding Organizer • Yogyakarta</p>
                </div>
            </div>
        </section>

        <!-- Panel Kanan (Form Login Vendor) -->
        <section class="bg-white rounded-3xl p-6 lg:p-8 flex flex-col justify-center min-h-[600px] shadow-[0_20px_50px_-12px_rgba(0,0,0,0.1)] border border-gray-100">
            
            <h2 class="font-serif text-2xl lg:text-3xl text-darkbrown shrink-0">Masuk ke Portal Mitra</h2>
            <p class="text-xs lg:text-sm text-muted mt-1 shrink-0">Silakan masukkan kredensial akun vendor terdaftar Anda.</p>

            <form method="POST" action="{{ url('/login-vendor') }}" class="mt-6 lg:mt-8 space-y-4 shrink-0">
                @csrf
                
                <!-- Email Bisnis -->
                <div>
                    <label class="text-xs font-medium text-darkbrown">Email Bisnis / ID Mitra</label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <input type="email" name="email" placeholder="owner@vendorwo.co.id" class="w-full bg-cream rounded-xl pl-9 pr-4 py-2.5 lg:py-3 text-xs lg:text-sm outline-none focus:ring-2 focus:ring-brown/30 placeholder:text-muted/60 shadow-inner border border-transparent focus:border-brown/20 transition-all">
                    </div>
                </div>

                <!-- Kata Sandi -->
                <!-- Kata Sandi -->
                <div>
                    <label class="text-xs font-medium text-darkbrown">Kata Sandi</label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </div>
                        <!-- Tambahkan ID -->
                        <input type="password" id="password-login-vendor" name="password" placeholder="Masukkan kata sandi Anda" class="w-full bg-cream rounded-xl pl-9 pr-10 py-2.5 lg:py-3 text-xs lg:text-sm outline-none focus:ring-2 focus:ring-brown/30 placeholder:text-muted/60 shadow-inner border border-transparent focus:border-brown/20 transition-all">
                        
                        <!-- Tambahkan atribut -->
                        <button type="button" data-toggle-password="password-login-vendor" class="absolute inset-y-0 right-0 pr-3 flex items-center text-muted hover:text-darkbrown transition-colors">
                            <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Ingat Saya & Lupa Password -->
                <div class="flex items-center justify-between text-xs text-muted">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-brown focus:ring-brown/30">
                        Ingat perangkat ini
                    </label>
                    <a href="#" class="text-brown hover:underline">Lupa Password?</a>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="w-full bg-brown hover:bg-darkbrown text-white font-medium py-3 lg:py-3.5 rounded-xl transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2 text-xs lg:text-sm hover:-translate-y-0.5 mt-2">
                    Masuk ke Dasbor Vendor →
                </button>
            </form>

            {{-- TOMBOL TESTING (Hanya muncul di local) --}}
            @if(app()->environment('local'))
            <div class="mt-4 pt-4 border-t border-dashed border-gray-300">
                <p class="text-[10px] text-center text-gray-400 mb-2 uppercase tracking-widest">Testing Tools</p>
                <div class="flex flex-col gap-2">
                    <button type="button" onclick="autoFillLogin('vendor')" class="w-full bg-blue-50 text-blue-600 border border-blue-200 hover:bg-blue-100 text-xs font-medium py-2 rounded-lg transition-colors flex justify-center items-center gap-2">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        Auto-Fill Akun Vendor
                    </button>
                    <button type="button" onclick="autoFillLogin('admin')" class="w-full bg-purple-50 text-purple-600 border border-purple-200 hover:bg-purple-100 text-xs font-medium py-2 rounded-lg transition-colors flex justify-center items-center gap-2">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        Auto-Fill Akun Admin
                    </button>
                </div>
            </div>
            @endif

            {{-- Link Daftar --}}
            <p class="text-center text-xs lg:text-sm text-muted shrink-0 mt-4">
            </form>

            <!-- Pemisah -->
            <div class="flex items-center gap-3 my-6 shrink-0">
                <div class="flex-1 h-px bg-gray-200"></div>
                <span class="text-[9px] lg:text-[10px] tracking-widest text-muted">ATAU</span>
                <div class="flex-1 h-px bg-gray-200"></div>
            </div>

            <!-- Link Daftar -->
            <p class="text-center text-xs lg:text-sm text-muted shrink-0">
                Belum bergabung sebagai mitra? <a href="{{ url('/register-vendor') }}" class="text-brown font-medium hover:underline">Daftar Mitra Vendor</a>
            </p>

            <!-- Badge Keamanan Bawah -->
            <div class="bg-cream rounded-xl p-3 mt-6 flex items-center justify-center gap-2 border border-gray-100 shrink-0">
                <svg class="w-4 h-4 text-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                <span class="text-[10px] font-medium text-muted">Dilindungi enkripsi standar industri & verifikasi mitra resmi.</span>
            </div>

        </section>
    </div>
    @if(app()->environment('local'))
        <script src="{{ asset('js/testing-autofill.js') }}"></script>
    @endif
@endsection