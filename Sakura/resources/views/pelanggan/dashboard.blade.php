@extends('layouts.pelanggan')

@section('title', 'Dashboard Pengantin - Sakura')

@section('content')
    <div class="bg-white rounded-3xl p-8 lg:p-12 shadow-sm border border-gray-100 min-h-[400px] flex flex-col justify-center items-center text-center">
        <div class="w-20 h-20 bg-peach rounded-full flex items-center justify-center mb-6">
            <svg class="w-10 h-10 text-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
        </div>
        <h1 class="font-serif text-3xl text-darkbrown mb-2">Selamat Datang, {{ Auth::user()->couple_name ?? Auth::user()->name }}!</h1>
        <p class="text-muted">Ini adalah halaman placeholder Dashboard Pelanggan. Area ini sudah menggunakan layout khusus tanpa header/footer publik.</p>
    </div>
@endsection