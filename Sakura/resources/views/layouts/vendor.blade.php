<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard Vendor - Sakura')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body class="bg-cream font-sans text-textdark min-h-screen flex">

    <!-- Sidebar Desktop (Kiri) -->
    <aside class="hidden lg:flex flex-col w-64 bg-darkbrown text-white border-r border-brown/20 min-h-screen sticky top-0 h-screen">
        <div class="h-20 flex items-center px-6 border-b border-white/10">
            <div class="text-2xl font-serif font-semibold text-white">Sakura <span class="text-xs font-sans font-normal text-peach ml-1">Vendor</span></div>
        </div>
        
        <div class="p-4 flex-1">
            <div class="bg-white/10 rounded-xl p-4 mb-6">
                <p class="text-xs text-white/60 mb-1">Mitra:</p>
                <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</p>
                <span class="inline-block mt-2 bg-peach text-darkbrown text-[10px] px-2 py-0.5 rounded-full font-medium">{{ Auth::user()->position ?? 'Vendor WO' }}</span>
            </div>
            
            <nav class="space-y-1">
                <a href="{{ route('vendor.dashboard') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('vendor.dashboard') ? 'bg-white/10 text-white font-medium' : 'text-white/70 hover:bg-white/5 hover:text-white' }} rounded-xl text-sm transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Dashboard
                </a>

                <a href="{{ route('vendor.onboarding') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('vendor.onboarding') ? 'bg-white/10 text-white font-medium' : 'text-white/70 hover:bg-white/5 hover:text-white' }} rounded-xl text-sm transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    Verifikasi Akun
                </a>
                <a href="{{ route('vendor.packages.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('vendor.packages.*') ? 'bg-white/10 text-white font-medium' : 'text-white/70 hover:bg-white/5 hover:text-white' }} rounded-xl text-sm transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    Kelola Paket
                </a>

                <span class="flex items-center gap-3 px-4 py-3 text-white/30 text-sm cursor-not-allowed">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    Leads & Klien (Segera)
                </span>
            </nav>
        </div>

        <div class="p-4 border-t border-white/10">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-3 px-4 py-3 w-full text-red-300 hover:bg-red-500/20 rounded-xl text-sm font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- Konten Utama -->
    <div class="flex-1 flex flex-col min-w-0">
        <header class="lg:hidden bg-darkbrown text-white h-16 flex items-center justify-between px-4 sticky top-0 z-50">
            <div class="text-xl font-serif font-semibold">Sakura Vendor</div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-red-300 text-sm font-medium">Keluar</button>
            </form>
        </header>

        <main class="flex-1 p-4 lg:p-8 w-full max-w-7xl mx-auto">
            @yield('content')
        </main>
    </div>

</body>
</html>