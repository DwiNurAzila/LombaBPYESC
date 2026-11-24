@extends('layouts.main')

@section('title', 'Daftar - Sakura')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8">

        <!-- Panel Kiri -->
        <section class="relative bg-peach rounded-3xl p-6 lg:p-8 flex flex-col justify-between min-h-[600px] overflow-hidden shadow-[0_20px_50px_-12px_rgba(140,106,79,0.15)] border border-white/40">
            
            <div class="relative z-10">
                <div class="inline-flex items-center gap-2 bg-white/70 backdrop-blur-sm border border-white rounded-full px-4 py-1.5 text-xs text-darkbrown shadow-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-brown"></span>
                    PORTAL CALON PENGANTIN
                </div>

                <h1 class="font-serif text-4xl lg:text-5xl leading-tight text-darkbrown mt-4 lg:mt-6 drop-shadow-sm">
                    Mulai Rancang<br>Pernikahan Impian<br>Anda.
                </h1>

                <p class="mt-4 lg:mt-6 font-serif italic text-sm text-brown max-w-sm leading-relaxed">
                    "Ketenangan hari bahagia berasal dari ketelitian langkah pertama yang terkurasi."
                </p>

                <div class="relative mt-6 lg:mt-8 rounded-2xl overflow-hidden shadow-lg border border-white/60 h-48 lg:h-56">
                    <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?q=80&w=1000&auto=format&fit=crop" alt="Wedding Planning" class="w-full h-full object-cover">
                    <div class="absolute bottom-3 left-3 bg-darkbrown/80 backdrop-blur-sm text-white text-[9px] lg:text-[10px] tracking-widest px-3 py-1.5 rounded-full flex items-center gap-1.5">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        PELAMINAN JALUR YANG TENANG
                    </div>
                </div>

                <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-4 mt-4 flex gap-3 items-center border border-white/50 shadow-sm">
                    <div class="w-10 h-10 rounded-full bg-peach flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 7h6m-6 4h6m-6 4h6M5 21h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-darkbrown">Smart Budget Calculator</p>
                        <p class="text-[10px] text-muted mt-0.5 leading-relaxed">Hitung estimasi biaya akad & resepsi presisi setiap saat tanpa rumus rumit.</p>
                    </div>
                </div>
            </div>

            <div class="relative z-10 mt-8 flex items-center gap-3">
                <div class="flex -space-x-2">
                    <div class="w-8 h-8 rounded-full bg-orange-200 border-2 border-white flex items-center justify-center text-[10px] font-bold text-orange-800">KH</div>
                    <div class="w-8 h-8 rounded-full bg-gray-300 border-2 border-white flex items-center justify-center text-[10px] font-bold text-gray-700">AC</div>
                </div>
                <p class="text-[10px] text-muted leading-tight">
                    <span class="font-bold text-darkbrown text-xs">18.600+ Pasangan</span> telah merencanakan hari sakralnya bersama Sakura.
                </p>
            </div>
        </section>

        <!-- Panel Kanan (Form Registrasi) -->
        <section class="bg-white rounded-3xl p-6 lg:p-8 flex flex-col justify-center shadow-[0_20px_50px_-12px_rgba(0,0,0,0.1)] border border-gray-100">
            
            <div class="flex items-center gap-2 mb-1">
                <span class="w-1.5 h-1.5 rounded-full bg-brown"></span>
                <span class="text-[10px] font-semibold tracking-widest text-brown uppercase">Registrasi Eksklusif</span>
            </div>

            <h2 class="font-serif text-2xl lg:text-3xl text-darkbrown shrink-0">Akun Calon Pengantin</h2>
            <p class="text-xs lg:text-sm text-muted mt-1 shrink-0">Dapatkan akses instan ke seluruh portofolio & transparansi perawatan vendor terbaik.</p>

            <button type="button" class="mt-4 lg:mt-6 w-full flex items-center justify-center gap-3 border border-gray-200 rounded-xl py-2.5 lg:py-3 text-xs lg:text-sm font-medium text-textdark hover:bg-gray-50 hover:shadow-sm transition-all shrink-0">
                <svg class="w-4 h-4 lg:w-5 lg:h-5" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
                Lanjutkan dengan Akun Google
            </button>

            <div class="flex items-center gap-3 my-4 shrink-0">
                <div class="flex-1 h-px bg-gray-200"></div>
                <span class="text-[9px] lg:text-[10px] tracking-widest text-muted">ATAU LENGKAPI FORMULIR SINGKAT</span>
                <div class="flex-1 h-px bg-gray-200"></div>
            </div>

            <form method="POST" action="{{ url('/register') }}" class="space-y-3 shrink-0">
                @csrf
                
                <!-- Nama -->
                <div>
                    <label class="text-[11px] font-medium text-darkbrown">Nama Anda & Pasangan <span class="text-brown">*</span></label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </div>
                        <input type="text" name="names" placeholder="Contoh: Kevin & Andini" class="w-full bg-cream rounded-xl pl-9 pr-4 py-2 lg:py-2.5 text-xs lg:text-sm outline-none focus:ring-2 focus:ring-brown/30 placeholder:text-muted/60 shadow-inner border border-transparent focus:border-brown/20 transition-all">
                    </div>
                </div>

                <!-- Email & WA -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div>
                        <label class="text-[11px] font-medium text-darkbrown">Alamat Email Aktif <span class="text-brown">*</span></label>
                        <div class="relative mt-1">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <input type="email" name="email" placeholder="nama@email.com" class="w-full bg-cream rounded-xl pl-9 pr-4 py-2 lg:py-2.5 text-xs lg:text-sm outline-none focus:ring-2 focus:ring-brown/30 placeholder:text-muted/60 shadow-inner border border-transparent focus:border-brown/20 transition-all">
                        </div>
                    </div>
                    <div>
                        <label class="text-[11px] font-medium text-darkbrown">Nomor WhatsApp Aktif <span class="text-brown">*</span></label>
                        <div class="relative mt-1">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <input type="text" name="whatsapp" placeholder="081234567890" class="w-full bg-cream rounded-xl pl-9 pr-4 py-2 lg:py-2.5 text-xs lg:text-sm outline-none focus:ring-2 focus:ring-brown/30 placeholder:text-muted/60 shadow-inner border border-transparent focus:border-brown/20 transition-all">
                        </div>
                    </div>
                </div>
                <p class="text-[9px] text-muted mt-1">Untuk konfirmasi cepat & ringkasan vendor via bot WhatsApp.</p>

                <!-- Estimasi Bulan & Tahun -->
                <div>
                    <label class="text-[11px] font-medium text-darkbrown">Estimasi Bulan / Tahun Acara</label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <select name="event_date" class="w-full bg-cream rounded-xl pl-9 pr-10 py-2 lg:py-2.5 text-xs lg:text-sm outline-none focus:ring-2 focus:ring-brown/30 text-muted/80 shadow-inner border border-transparent focus:border-brown/20 transition-all appearance-none">
                            <option value="" disabled selected>Pilih perkiraan waktu pernikahan Anda</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                    </div>
                </div>

                <!-- Kata Sandi -->
                <div>
                    <div class="flex justify-between items-center">
                        <label class="text-[11px] font-medium text-darkbrown">Kata Sandi Baru <span class="text-brown">*</span></label>
                        <span class="text-[9px] text-muted">Minimal 8 karakter</span>
                    </div>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </div>
                        <input type="password" name="password" placeholder="••••••••••••" class="w-full bg-cream rounded-xl pl-9 pr-10 py-2 lg:py-2.5 text-xs lg:text-sm outline-none focus:ring-2 focus:ring-brown/30 placeholder:text-muted/60 shadow-inner border border-transparent focus:border-brown/20 transition-all">
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-muted hover:text-darkbrown">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Checkbox Setuju -->
                <div class="flex items-start gap-2 pt-1">
                    <input type="checkbox" name="terms" id="terms" class="mt-0.5 rounded border-gray-300 text-brown focus:ring-brown/30">
                    <label for="terms" class="text-[10px] text-muted leading-relaxed cursor-pointer">
                        Saya setuju dengan Ketentuan Layanan & Kebijakan Privasi TemulHati untuk perlindungan data pra-nikah saya.
                    </label>
                </div>

                <button type="submit" class="w-full bg-brown hover:bg-darkbrown text-white font-medium py-3 lg:py-3.5 rounded-xl transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2 text-xs lg:text-sm mt-2 hover:-translate-y-0.5">
                    Daftar & Dapatkan Akses Kalkulator Anggaran →
                </button>
            </form>

            <p class="text-center text-xs text-muted mt-4 shrink-0">
                Sudah punya akun? <a href="{{ url('/login') }}" class="text-brown font-medium hover:underline">Masuk di sini</a>
            </p>

        </section>
    </div>
@endsection