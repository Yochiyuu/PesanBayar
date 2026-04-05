@extends('layouts.app')

@section('title', 'Invoice Pesanan #' . $order->id)

@section('content')
    <div class="max-w-md mx-auto w-full my-16 px-4">
        <div class="bg-white rounded-3xl shadow-lg border border-slate-200 overflow-hidden">
            <div class="bg-emerald-500 p-8 text-center text-white">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold mb-1">Pesanan Diterima!</h1>
                <p class="text-emerald-100 text-sm">Menunggu proses pembayaran.</p>
            </div>

            <div class="p-8">
                <div class="flex justify-between items-center mb-6 pb-6 border-b border-slate-100 border-dashed">
                    <div>
                        <p class="text-sm text-slate-500 mb-1">Pemesan</p>
                        <p class="font-bold text-slate-800">{{ $order->customer_name }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-slate-500 mb-1">Meja</p>
                        <p class="font-bold text-slate-800 text-xl">{{ $order->table_number }}</p>
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-sm font-bold text-slate-400 mb-4 uppercase tracking-wider">Ringkasan Pesanan</h3>
                    <div class="space-y-4">
                        @foreach ($order->orderItems as $item)
                            <div class="flex justify-between items-start">
                                <div class="flex gap-3">
                                    <div class="bg-slate-100 text-slate-600 font-bold px-2.5 py-1 rounded-md text-sm h-fit">
                                        {{ $item->quantity }}x</div>
                                    <div>
                                        <p class="font-semibold text-slate-800">{{ $item->menu->name }}</p>
                                        <p class="text-xs text-slate-500 mt-0.5">@
                                            Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                                <p class="font-semibold text-slate-800">
                                    Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="border-t-2 border-slate-800 border-dashed pt-5 mb-8">
                    <div class="flex justify-between items-center">
                        <p class="font-bold text-slate-800">Total Tagihan</p>
                        <p class="font-black text-2xl text-indigo-600">
                            Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
                    </div>
                </div>

                <button
                    class="w-full bg-slate-900 hover:bg-slate-800 text-white font-bold py-4 rounded-xl text-center transition-all flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    Bayar Sekarang
                </button>
            </div>
        </div>
    </div>
@endsection
