@extends('layouts.app')

@section('content')
    <div class="relative bg-gray-900 h-64">
        <img class="w-full h-full object-cover opacity-60"
            src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
            alt="Restaurant Background">
        <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-gray-900 to-transparent">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-3xl font-bold text-white mb-2">{{ $restaurant->name ?? 'Nama Restoran' }}</h1>
                <p class="text-gray-200 text-sm flex items-center gap-2">
                    <span class="bg-green-500 w-2 h-2 rounded-full"></span> Buka Sekarang
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 py-8">
        <h2 class="text-xl font-bold text-gray-900 mb-6 border-b pb-2">Menu Favorit</h2>

        <form action="{{ route('order.store', $restaurant->id ?? 1) }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div
                    class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex hover:shadow-md transition">
                    <img class="w-32 h-32 object-cover"
                        src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=500&q=60"
                        alt="Menu">
                    <div class="p-4 flex flex-col justify-between flex-grow">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Nasi Goreng Spesial</h3>
                            <p class="text-sm text-gray-500 line-clamp-2">Nasi goreng dengan telur, ayam suwir, dan bumbu
                                rempah pilihan.</p>
                        </div>
                        <div class="flex items-center justify-between mt-2">
                            <span class="font-bold text-orange-600">Rp 25.000</span>
                            <div class="flex items-center bg-gray-100 rounded-full">
                                <button type="button"
                                    class="w-8 h-8 flex items-center justify-center text-gray-600 hover:text-orange-600">-</button>
                                <span class="text-sm font-medium w-4 text-center">0</span>
                                <button type="button"
                                    class="w-8 h-8 flex items-center justify-center text-gray-600 hover:text-orange-600">+</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 p-4 shadow-2xl z-50">
                <div class="max-w-4xl mx-auto flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Total Pesanan</p>
                        <p class="text-xl font-bold text-gray-900">Rp 0</p>
                    </div>
                    <button type="submit"
                        class="bg-orange-600 hover:bg-orange-700 text-white font-medium py-3 px-8 rounded-full shadow-lg transition">
                        Pesan Sekarang
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
