@extends('layouts.vendor')

@section('title', 'Dashboard Vendor - Sakura')

@section('content')
    <div class="bg-white rounded-3xl p-8 lg:p-12 shadow-sm border border-gray-100 min-h-[400px] flex flex-col justify-center items-center text-center">
        <div class="w-20 h-20 bg-peach rounded-full flex items-center justify-center mb-6">
            <svg class="w-10 h-10 text-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        </div>
        <h1 class="font-serif text-3xl text-darkbrown mb-2">Selamat Datang, Mitra {{ Auth::user()->name }}!</h1>
        <p class="text-muted">Ini adalah halaman placeholder Dashboard Vendor WO. Area ini sudah menggunakan layout khusus dengan sidebar.</p>
    </div>
@endsection