<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sakura')</title>
    
    <!-- Tambahkan baris ini untuk Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logos/logo-sakura.jpeg') }}">
    
    <!-- Memanggil CSS & JS dari Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body class="bg-cream font-sans text-textdark min-h-screen flex flex-col">

    <!-- Header -->
    <header class="w-full px-6 lg:px-8 py-4 lg:py-5 flex items-center justify-between shrink-0 bg-white border-b border-brown/10 shadow-sm relative z-50">
        <div class="flex items-center gap-3">
            <!-- Logo Sakura (Hanya ikon) -->
            <div class="w-10 h-10 lg:w-12 lg:h-12 rounded-md flex items-center justify-center bg-[#FDF8F0] shrink-0 relative overflow-hidden">
                <img src="{{ asset('images/logos/logo-sakura.jpeg') }}" alt="Logo Sakura" class="absolute w-full h-[160%] object-cover object-top top-0">
            </div>  
            <div class="text-2xl font-serif font-semibold text-darkbrown">Sakura</div>
        </div>

        <!-- Tombol Kontekstual (Berubah sesuai halaman) -->
        <div>
            @if(request()->is('login-vendor') || request()->is('register-vendor'))
                <!-- Tampil jika sedang di halaman Vendor -->
                <a href="{{ url('/login') }}" class="inline-flex items-center justify-center gap-2 bg-cream hover:bg-peach/50 border border-brown/30 hover:border-brown/60 text-darkbrown text-xs lg:text-sm font-medium px-4 py-2 lg:px-5 lg:py-2.5 rounded-full transition-all shadow-sm hover:shadow-md">
                    Masuk Sebagai Pelanggan
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                </a>
            @else
                <!-- Tampil jika sedang di halaman Pelanggan (Login/Register) -->
                <a href="{{ url('/login-vendor') }}" class="inline-flex items-center justify-center gap-2 bg-cream hover:bg-peach/50 border border-brown/30 hover:border-brown/60 text-darkbrown text-xs lg:text-sm font-medium px-4 py-2 lg:px-5 lg:py-2.5 rounded-full transition-all shadow-sm hover:shadow-md">
                    Masuk sebagai Vendor
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                </a>
            @endif
        </div>
    </header>

    <!-- Konten Utama (Akan diisi oleh halaman lain) -->
    <main class="flex-1 w-full max-w-7xl mx-auto px-4 lg:px-8 py-4 flex flex-col">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="w-full bg-peach shrink-0 mt-auto border-t border-brown/10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-6 flex flex-col md:flex-row justify-between items-center gap-6">
            
            <!-- Kiri: Brand & Deskripsi -->
            <div class="md:w-1/3 text-center md:text-left">
                <div class="text-lg font-serif font-semibold text-darkbrown">Sakura</div>
                <p class="text-[10px] text-muted mt-1 leading-relaxed max-w-xs mx-auto md:mx-0">
                    Kurasi pernikahan berbahagia untuk calon pengantin istimewa. Menjaga privasi Anda dengan standar keamanan terverifikasi.
                </p>
            </div>

            <!-- Tengah: Badge Keamanan -->
            <div class="md:w-1/3 flex justify-center">
                <div class="bg-white/80 border border-white rounded-full px-5 py-2.5 flex flex-wrap justify-center items-center gap-4 text-[10px] font-medium text-darkbrown shadow-sm">
                    <span class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        PRIVASI TERLINDUNGI
                    </span>
                    <span class="text-gray-300">|</span>
                    <span class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        VENDOR RESMI TERAKREDITASI
                    </span>
                </div>
            </div>

            <!-- Kanan: Links & Copyright -->
            <div class="md:w-1/3 text-center md:text-right text-[10px] text-muted space-y-2">
                <div class="flex justify-center md:justify-end gap-5 font-medium">
                    <a href="#" class="hover:text-darkbrown transition-colors">PRIVASI</a>
                    <a href="#" class="hover:text-darkbrown transition-colors">SYARAT</a>
                    <a href="#" class="hover:text-darkbrown transition-colors">BANTUAN</a>
                </div>
                <p class="text-[9px]">© 2026 Sakura. Hak Cipta Dilindungi.</p>
            </div>

        </div>
    </footer>
    <!-- Script Show/Hide Password (Global untuk halaman Auth) -->
    <script src="{{ asset('js/password-toggle.js') }}"></script>
</body>
</html>