@extends('layouts.main')

@section('title', 'Masuk - Sakura')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8">

        <!-- Panel Kiri -->
        <section class="relative bg-peach rounded-3xl p-6 lg:p-8 flex flex-col justify-between min-h-[600px] overflow-hidden shadow-[0_20px_50px_-12px_rgba(140,106,79,0.15)] border border-white/40">
            
            <div class="absolute -top-10 -right-10 w-64 h-64 opacity-30 pointer-events-none mix-blend-multiply">
                <img src="https://images.unsplash.com/photo-1526047932273-341f2a7631f9?q=80&w=1000&auto=format&fit=crop" alt="Floral Background" class="w-full h-full object-cover rounded-full blur-[2px]">
            </div>
            <div class="absolute -bottom-20 -left-10 w-80 h-80 opacity-20 pointer-events-none mix-blend-multiply">
                <img src="https://images.unsplash.com/photo-1490750967868-88cb4ecb07e6?q=80&w=1000&auto=format&fit=crop" alt="Floral Background 2" class="w-full h-full object-cover rounded-full blur-[2px]">
            </div>

            <div class="relative z-10">
                <div class="inline-flex items-center gap-2 bg-white/70 backdrop-blur-sm border border-white rounded-full px-4 py-1.5 text-xs text-darkbrown shadow-sm">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    RUANG CALON PENGANTIN
                </div>

                <h1 class="font-serif text-4xl lg:text-5xl xl:text-6xl leading-tight text-darkbrown mt-4 lg:mt-6 drop-shadow-sm">
                    Kembali<br>Menyusun Hari<br>Bahagia.
                </h1>

                <p class="mt-4 lg:mt-6 text-sm text-muted max-w-md leading-relaxed">
                    Akses kalkulator anggaran cerdas, direktori vendor terkurasi, dan konsultasi sakral Anda dalam satu simfoni yang tenang.
                </p>

                <div class="grid grid-cols-3 gap-3 mt-6 lg:mt-8">
                    <div class="bg-white rounded-2xl p-3 lg:p-4 border border-white/60 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="w-8 h-8 rounded-full bg-peach flex items-center justify-center mb-2 lg:mb-3 shadow-inner">
                            <svg class="w-4 h-4 text-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <p class="text-[11px] lg:text-xs font-semibold text-darkbrown">Proteksi Escrow</p>
                        <p class="text-[9px] lg:text-[10px] text-muted mt-1 leading-relaxed">Dana aman hingga acara terkonfirmasi.</p>
                    </div>
                    <div class="bg-white rounded-2xl p-3 lg:p-4 border border-white/60 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="w-8 h-8 rounded-full bg-peach flex items-center justify-center mb-2 lg:mb-3 shadow-inner">
                            <svg class="w-4 h-4 text-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 7h6m-6 4h6m-6 4h6M5 21h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                        </div>
                        <p class="text-[11px] lg:text-xs font-semibold text-darkbrown">Anggaran Otomatis</p>
                        <p class="text-[9px] lg:text-[10px] text-muted mt-1 leading-relaxed">Simulasi biaya rill tanpa selisih.</p>
                    </div>
                    <div class="bg-white rounded-2xl p-3 lg:p-4 border border-white/60 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="w-8 h-8 rounded-full bg-peach flex items-center justify-center mb-2 lg:mb-3 shadow-inner">
                            <svg class="w-4 h-4 text-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <p class="text-[11px] lg:text-xs font-semibold text-darkbrown">Vendor Terverifikasi</p>
                        <p class="text-[9px] lg:text-[10px] text-muted mt-1 leading-relaxed">Portofolio & rekam jejak teruji.</p>
                    </div>
                </div>
            </div>

            <div class="relative z-10 bg-white/95 backdrop-blur-sm rounded-2xl p-4 lg:p-5 mt-6 flex gap-3 lg:gap-4 items-start shadow-lg border border-white shrink-0">
                <div class="w-12 h-12 lg:w-16 lg:h-16 rounded-lg overflow-hidden flex-shrink-0 shadow-md">
                    <img src="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=200&auto=format&fit=crop" alt="Wedding Couple" class="w-full h-full object-cover">
                </div>
                <div>
                    <div class="flex items-center gap-1 text-yellow-500 text-xs">
                        ★★★★★ <span class="text-muted ml-1">5.0 / 5.0</span>
                    </div>
                    <p class="font-serif italic text-xs lg:text-sm text-darkbrown mt-1 leading-snug">"Sakura menghadirkan waktu kami dalam memilih WO tradisional yang amanah dan transparan."</p>
                    <p class="text-[9px] lg:text-[10px] text-muted mt-2">Andini & Raditya — Jakarta Selatan (Menikah Nov 2025)</p>
                </div>
            </div>
        </section>

        <!-- Panel Kanan -->
        <section class="bg-white rounded-3xl p-6 lg:p-8 flex flex-col justify-center min-h-[600px] shadow-[0_20px_50px_-12px_rgba(0,0,0,0.1)] border border-gray-100">
            
            <h2 class="font-serif text-2xl lg:text-3xl text-darkbrown shrink-0">Selamat Datang</h2>
            <p class="text-xs lg:text-sm text-muted mt-1 shrink-0">Rencanakan pesta pernikahan tanpa rasa cemas.</p>

            <button type="button" class="mt-4 lg:mt-6 w-full flex items-center justify-center gap-3 border border-gray-200 rounded-xl py-2.5 lg:py-3 text-xs lg:text-sm font-medium text-textdark hover:bg-gray-50 hover:shadow-sm transition-all shrink-0">
                <svg class="w-4 h-4 lg:w-5 lg:h-5" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
                Lanjutkan dengan Akun Google
            </button>

            <div class="flex items-center gap-3 my-4 lg:my-6 shrink-0">
                <div class="flex-1 h-px bg-gray-200"></div>
                <span class="text-[9px] lg:text-[10px] tracking-widest text-muted">ATAU GUNAKAN EMAIL TERDAFTAR</span>
                <div class="flex-1 h-px bg-gray-200"></div>
            </div>

            <form method="POST" action="{{ url('/login') }}" class="space-y-3 lg:space-y-4 shrink-0">
                @csrf
                <div>
                    <label class="text-xs font-medium text-darkbrown">Email atau Nomor WhatsApp Pengantin</label>
                    <input type="text" name="login" placeholder="arindya@Sakura.id atau 081234567890" class="mt-1 w-full bg-cream rounded-xl px-4 py-2 lg:py-3 text-xs lg:text-sm outline-none focus:ring-2 focus:ring-brown/30 placeholder:text-muted/60 shadow-inner border border-transparent focus:border-brown/20 transition-all">
                </div>
                <div>
                <div>
                    <div class="flex justify-between items-center">
                        <label class="text-xs font-medium text-darkbrown">Kata Sandi</label>
                        <a href="#" class="text-[10px] lg:text-[11px] text-brown hover:underline">Lupa Kata Sandi?</a>
                    </div>
                    <div class="relative mt-1">
                        <!-- Tambahkan ID pada input -->
                        <input type="password" id="password-login" name="password" placeholder="Masukkan kata sandi aman Anda" class="w-full bg-cream rounded-xl px-4 py-2 lg:py-3 text-xs lg:text-sm outline-none focus:ring-2 focus:ring-brown/30 placeholder:text-muted/60 pr-12 shadow-inner border border-transparent focus:border-brown/20 transition-all">
                        
                        <!-- Tambahkan atribut data-toggle-password dan type="button" -->
                        <button type="button" data-toggle-password="password-login" class="absolute right-3 top-1/2 -translate-y-1/2 text-muted hover:text-darkbrown transition-colors">
                            <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </button>
                    </div>
                </div>

                <label class="flex items-center gap-2 text-xs text-muted cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-brown focus:ring-brown/30">
                    Ingat saya di perangkat ini
                </label>

                <button type="submit" class="w-full bg-brown hover:bg-darkbrown text-white font-medium py-2.5 lg:py-3.5 rounded-xl transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2 text-xs lg:text-sm hover:-translate-y-0.5">
                    Masuk ke Ruang Pengantin →
                </button>
            </form>

            {{-- TOMBOL TESTING (Hanya muncul di local) --}}
            @if(app()->environment('local'))
            <div class="mt-4 pt-4 border-t border-dashed border-gray-300">
                <p class="text-[10px] text-center text-gray-400 mb-2 uppercase tracking-widest">Testing Tools</p>
                <button type="button" onclick="autoFillLogin('pengantin')" class="w-full bg-blue-50 text-blue-600 border border-blue-200 hover:bg-blue-100 text-xs font-medium py-2 rounded-lg transition-colors flex justify-center items-center gap-2">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    Auto-Fill Akun Pengantin
                </button>
            </div>
            @endif

            <p class="text-center text-xs lg:text-sm text-muted mt-4 lg:mt-6 shrink-0">
            </form>

            <p class="text-center text-xs lg:text-sm text-muted mt-4 lg:mt-6 shrink-0">
                Belum memiliki akun impian? <a href="{{ url('/register') }}" class="text-brown font-medium hover:underline">Daftar Gratis Sekarang</a>
            </p>

            <div class="flex items-start gap-2 mt-4 lg:mt-6 text-[10px] lg:text-[11px] text-muted shrink-0">
                <svg class="w-4 h-4 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                Privasi dan data persiapan pernikahan Anda terenkripsi aman secara kolektif.
            </div>
        </section>
    </div>
    @if(app()->environment('local'))
        <script src="{{ asset('js/testing-autofill.js') }}"></script>
    @endif
@endsection