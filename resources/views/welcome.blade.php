@extends('layouts.app')

@section('title', 'PesanBayar - Beranda')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32 flex flex-col items-center text-center">
    <div class="inline-flex items-center px-4 py-2 rounded-full bg-indigo-50 text-indigo-700 font-medium text-sm mb-8 border border-indigo-100">
        ✨ Solusi F&B Modern
    </div>
    <h1 class="text-5xl md:text-7xl font-extrabold text-slate-900 tracking-tight mb-8 leading-tight">
        Pesan & Bayar Langsung <br class="hidden md:block">
        <span class="text-indigo-600 text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-violet-500">
            Dari Meja Pelanggan.
        </span>
    </h1>
    <p class="text-lg md:text-xl text-slate-600 max-w-2xl mb-12 leading-relaxed">
        Tingkatkan omset dan efisiensi restoran Anda. Pelanggan cukup scan QR, pilih menu, bayar via e-Wallet, dan pesanan langsung masuk ke dapur.
    </p>
    <a href="{{ route('restaurant.create') }}" class="bg-slate-900 hover:bg-slate-800 text-white text-lg px-8 py-4 rounded-xl font-semibold transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
        Buka Restoran Sekarang
    </a>
</div>
@endsection