<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard Pengantin - Sakura')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body class="bg-cream font-sans text-textdark min-h-screen flex">

    <!-- Sidebar Desktop (Kiri) -->
    <aside class="hidden lg:flex flex-col w-64 bg-white border-r border-gray-200 min-h-screen sticky top-0 h-screen">
        <div class="h-20 flex items-center px-6 border-b border-gray-100">
            <div class="text-2xl font-serif font-semibold text-darkbrown">Sakura</div>
        </div>
        
        <div class="p-4 flex-1">
            <div class="bg-peach/50 rounded-xl p-4 mb-6">
                <p class="text-xs text-muted mb-1">Masuk sebagai:</p>
                <p class="text-sm font-semibold text-darkbrown truncate">{{ Auth::user()->couple_name ?? Auth::user()->name }}</p>
                <span class="inline-block mt-2 bg-white text-[10px] px-2 py-0.5 rounded-full text-brown font-medium border border-brown/20">Calon Pengantin</span>
            </div>
            
            <nav class="space-y-1">
                <a href="{{ route('pelanggan.dashboard') }}" class="flex items-center gap-3 px-4 py-3 bg-cream text-darkbrown font-medium rounded-xl text-sm transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Dashboard
                </a>
                <!-- Placeholder menu lain -->
                <span class="flex items-center gap-3 px-4 py-3 text-muted text-sm cursor-not-allowed opacity-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 7h6m-6 4h6m-6 4h6M5 21h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                    Kalkulator Anggaran (Segera)
                </span>
                <span class="flex items-center gap-3 px-4 py-3 text-muted text-sm cursor-not-allowed opacity-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    Cari Vendor (Segera)
                </span>
            </nav>
        </div>

        <div class="p-4 border-t border-gray-100">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-3 px-4 py-3 w-full text-red-500 hover:bg-red-50 rounded-xl text-sm font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- Konten Utama -->
    <div class="flex-1 flex flex-col min-w-0">
        <!-- Topbar Mobile -->
        <header class="lg:hidden bg-white border-b border-gray-200 h-16 flex items-center justify-between px-4 sticky top-0 z-50">
            <div class="text-xl font-serif font-semibold text-darkbrown">Sakura</div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-red-500 text-sm font-medium">Keluar</button>
            </form>
        </header>

        <main class="flex-1 p-4 lg:p-8 w-full max-w-7xl mx-auto">
            @yield('content')
        </main>
    </div>

</body>
</html>