<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center max-w-3xl mx-auto">
            <h2 class="font-semibold text-xl text-gray-900 leading-tight">
                {{ __('Keranjang Pesanan') }}
            </h2>
            @if ($restaurant)
                <a href="{{ route('restaurant.show', $restaurant->slug) }}"
                    class="text-sm font-semibold text-orange-500 hover:text-orange-600 transition">
                    + Tambah Menu Lain
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            @if (count($cart) > 0)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 p-6 md:p-8 mb-6">
                    <div class="mb-6 pb-4 border-b border-gray-100 flex items-center gap-3">
                        <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Memesan dari:</p>
                            <h3 class="text-lg font-bold text-gray-900">{{ $restaurant->name }}</h3>
                        </div>
                    </div>

                    <div class="space-y-6">
                        @foreach ($cart as $id => $details)
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4 flex-1">
                                    @if ($details['image'])
                                        <img src="{{ asset('storage/' . $details['image']) }}"
                                            alt="{{ $details['name'] }}"
                                            class="w-16 h-16 object-cover rounded-lg border border-gray-100 shadow-sm">
                                    @else
                                        <div
                                            class="w-16 h-16 bg-gray-50 flex items-center justify-center rounded-lg border border-gray-100">
                                            <span class="text-gray-400 text-[10px] font-bold uppercase">No Img</span>
                                        </div>
                                    @endif

                                    <div>
                                        <h4 class="font-semibold text-gray-900">{{ $details['name'] }}</h4>
                                        <p class="text-sm text-orange-500 font-bold mt-0.5">
                                            Rp{{ number_format($details['price'], 0, ',', '.') }}</p>
                                    </div>
                                </div>

                                <div
                                    class="flex items-center gap-3 bg-gray-50 border border-gray-200 rounded-lg p-1 shadow-sm">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="w-8 h-8 flex items-center justify-center bg-white text-gray-600 rounded-md shadow-sm hover:bg-gray-100 transition font-bold">
                                            -
                                        </button>
                                    </form>
                                    <span
                                        class="font-semibold text-gray-900 w-4 text-center text-sm">{{ $details['quantity'] }}</span>
                                    <form action="{{ route('cart.add', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="w-8 h-8 flex items-center justify-center bg-orange-500 text-white rounded-md shadow-sm hover:bg-orange-600 transition font-bold">
                                            +
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 p-6 md:p-8">
                    <div class="flex justify-between items-center mb-6">
                        <span class="text-gray-600 font-medium">Total Pembayaran</span>
                        <span
                            class="text-2xl font-extrabold text-gray-900">Rp{{ number_format($total, 0, ',', '.') }}</span>
                    </div>

                    <form action="{{ route('order.store', $restaurant->id) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Pemesan / No.
                                Meja</label>
                            <input type="text" name="customer_name" required placeholder="Contoh: Meja 4 (Budi)"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 shadow-sm transition text-sm">
                        </div>
                        <button type="submit"
                            class="w-full bg-orange-500 text-white font-bold py-4 rounded-xl shadow-md hover:bg-orange-600 hover:shadow-lg transition flex justify-center items-center gap-2">
                            Buat Pesanan Sekarang
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            @else
                <div class="text-center py-20 bg-white rounded-xl border border-gray-100 shadow-sm">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-orange-50 mb-4">
                        <svg class="w-10 h-10 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Keranjang masih kosong</h3>
                    <p class="text-gray-500 text-sm mb-6">Pilih menu favorit Anda terlebih dahulu.</p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
