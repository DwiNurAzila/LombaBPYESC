@extends('layouts.admin')

@section('title', 'Dashboard Admin - Sakura')

@section('content')
    <div class="bg-white rounded-xl p-8 lg:p-12 shadow-sm border border-gray-200 min-h-[400px] flex flex-col justify-center items-center text-center">
        <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mb-6">
            <svg class="w-10 h-10 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        </div>
        <h1 class="font-sans text-3xl font-bold text-slate-800 mb-2">Selamat Datang, Super Admin!</h1>
        <p class="text-slate-500">Ini adalah halaman placeholder Dashboard Admin. Layout ini menggunakan skema warna yang lebih netral untuk area manajemen.</p>
    </div>
@endsection