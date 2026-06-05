<x-app-layout>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div>
                <h1 class="font-extrabold text-2xl text-gray-900 tracking-tight">Detail Pesanan</h1>
                <p class="text-gray-500 text-sm mt-1">Terima kasih, <span
                        class="font-semibold text-gray-900">{{ $order->customer_name }}</span>!</p>
            </div>
            <a href="{{ route('restaurant.show', $order->restaurant->slug ?? '') }}"
                class="text-sm font-semibold text-gray-500 hover:text-orange-500 bg-white border border-gray-200 px-4 py-2 rounded-lg transition">
                &larr; Kembali Menu
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div
                    class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg font-medium text-sm flex items-center shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                <div class="lg:col-span-7 space-y-6">
                    <div class="bg-white shadow-sm sm:rounded-xl border border-gray-100 overflow-hidden">
                        <div class="bg-gray-50/50 border-b border-gray-100 p-6 flex items-center gap-3">
                            <div
                                class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center text-gray-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900">Rincian Menu</h3>
                                <p class="text-xs text-gray-500">Order ID:
                                    #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</p>
                            </div>
                        </div>

                        <div class="p-6 space-y-5">
                            @foreach ($order->items as $item)
                                <div
                                    class="flex justify-between items-center border-b border-dashed border-gray-200 pb-5 last:border-0 last:pb-0">
                                    <div class="flex items-start gap-4">
                                        <span
                                            class="font-bold text-orange-500 bg-orange-50 rounded-lg w-10 h-10 flex items-center justify-center text-sm border border-orange-100">{{ $item->quantity }}x</span>
                                        <div>
                                            <p class="font-bold text-gray-900 text-base">
                                                {{ $item->menu->name ?? 'Menu tidak tersedia' }}</p>
                                            <p class="text-sm text-gray-500 mt-0.5">
                                                Rp{{ number_format($item->price, 0, ',', '.') }} / item</p>
                                        </div>
                                    </div>
                                    <span
                                        class="font-extrabold text-gray-900">Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5">
                    <div class="bg-white shadow-sm sm:rounded-xl border border-gray-100 overflow-hidden sticky top-24">

                        <div class="p-6 border-b border-gray-100 grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Status Dapur
                                </p>
                                @if ($order->order_status === 'pending')
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700 border border-yellow-200">Menunggu</span>
                                @elseif($order->order_status === 'proses')
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700 border border-blue-200">Dimasak</span>
                                @elseif($order->order_status === 'selesai')
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 border border-green-200">Selesai</span>
                                @else
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700 border border-red-200">{{ ucfirst($order->order_status) }}</span>
                                @endif
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Pembayaran</p>
                                @if ($order->payment_status === 'paid')
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 border border-green-200">Lunas</span>
                                @else
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700 border border-red-200">Belum
                                        Bayar</span>
                                @endif
                            </div>
                        </div>

                        <div class="p-6 bg-gray-50">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-semibold text-gray-600">Restoran</span>
                                <span class="font-bold text-gray-900">{{ $order->restaurant->name ?? '-' }}</span>
                            </div>
                            <div class="flex justify-between items-center mb-6">
                                <span class="font-semibold text-gray-600">Waktu</span>
                                <span class="font-bold text-gray-900">{{ $order->created_at->format('H:i') }}</span>
                            </div>

                            <div class="flex justify-between items-center border-t border-gray-200 pt-6">
                                <span class="font-bold text-gray-800">Total Tagihan</span>
                                <span
                                    class="font-extrabold text-2xl text-orange-500">Rp{{ number_format($order->total_price, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        @if ($order->payment_status === 'unpaid')
                            <div class="p-6 border-t border-gray-100">
                                <button
                                    class="w-full bg-gray-900 text-white font-bold py-4 rounded-xl shadow-md hover:bg-gray-800 transition flex justify-center items-center gap-2">
                                    Bayar Sekarang
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </button>
                            </div>
                        @endif

                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
