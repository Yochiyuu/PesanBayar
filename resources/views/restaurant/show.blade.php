@extends('layouts.app')

@section('title', $restaurant->name . ' - Menu')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-12">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-slate-900 mb-3">{{ $restaurant->name }}</h1>
            <p class="text-slate-500 text-lg">{{ $restaurant->description }}</p>
        </div>

        <form action="{{ route('order.store', $restaurant->id) }}" method="POST">
            @csrf

            <div
                class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-slate-200 mb-10 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Pemesan</label>
                    <input type="text" name="customer_name" required
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition-all"
                        placeholder="Masukkan nama Anda">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nomor Meja</label>
                    <input type="text" name="table_number" required
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition-all"
                        placeholder="Contoh: 12">
                </div>
            </div>

            <div class="flex justify-between items-end mb-6">
                <h2 class="text-2xl font-bold text-slate-800">Daftar Menu</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                @foreach ($restaurant->menus as $menu)
                    <div
                        class="bg-white p-5 rounded-2xl shadow-sm border border-slate-200 flex flex-col justify-between hover:border-indigo-300 transition-all">
                        <div>
                            <h3 class="font-bold text-slate-800 text-lg">{{ $menu->name }}</h3>
                            <p class="text-slate-500 text-sm mt-1 mb-3 line-clamp-2">{{ $menu->description }}</p>
                            <p class="text-indigo-600 font-bold text-lg">Rp{{ number_format($menu->price, 0, ',', '.') }}
                            </p>
                        </div>

                        <div class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-sm font-medium text-slate-600">Jumlah:</span>
                            <input type="hidden" name="items[{{ $loop->index }}][menu_id]" value="{{ $menu->id }}">
                            <input type="hidden" name="items[{{ $loop->index }}][price]" value="{{ $menu->price }}">
                            <input type="number" name="items[{{ $loop->index }}][quantity]" value="0" min="0"
                                class="w-20 text-center px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none font-semibold">
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="w-full md:w-auto bg-slate-900 hover:bg-slate-800 text-white font-bold py-4 px-12 rounded-xl text-lg transition-colors shadow-lg flex items-center justify-center gap-2">
                    Proses Pesanan
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
                        </path>
                    </svg>
                </button>
            </div>
        </form>
    </div>
@endsection
