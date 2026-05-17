<x-app-layout>
    <x-slot name="header">
        <div class="text-center py-6">
            <h1 class="font-extrabold text-3xl text-gray-900 tracking-tight">Detail Pesanan</h1>
            <p class="text-gray-500 text-sm mt-2">Terima kasih atas pesanan Anda, <span
                    class="font-semibold text-gray-900">{{ $order->customer_name }}</span>!</p>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div
                    class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg font-medium text-sm flex items-center justify-center shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-xl border border-gray-100 overflow-hidden mb-6">
                <div class="bg-gray-50/50 border-b border-gray-100 p-6 md:p-8 flex justify-between items-center">
                    <div>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Restoran</p>
                        <h2 class="text-xl font-bold text-gray-900">{{ $order->restaurant->name ?? 'Restoran' }}</h2>
                    </div>
                    <div class="text-right">
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Status</p>
                        @if ($order->status === 'pending')
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-yellow-100 text-yellow-700">
                                Menunggu Konfirmasi
                            </span>
                        @elseif($order->status === 'proses')
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-blue-100 text-blue-700">
                                Sedang Dimasak
                            </span>
                        @elseif($order->status === 'selesai')
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-green-100 text-green-700">
                                Selesai
                            </span>
                        @else
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-gray-100 text-gray-700">
                                {{ ucfirst($order->status) }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="p-6 md:p-8 space-y-4">
                    @foreach ($order->items as $item)
                        <div
                            class="flex justify-between items-center border-b border-dashed border-gray-200 pb-4 last:border-0 last:pb-0">
                            <div class="flex items-start gap-4">
                                <span
                                    class="font-bold text-gray-900 bg-gray-100 rounded-md w-8 h-8 flex items-center justify-center text-sm">{{ $item->quantity }}x</span>
                                <div>
                                    <p class="font-semibold text-gray-900">
                                        {{ $item->menu->name ?? 'Menu tidak tersedia' }}</p>
                                    <p class="text-sm text-gray-500">Rp{{ number_format($item->price, 0, ',', '.') }} /
                                        item</p>
                                </div>
                            </div>
                            <span
                                class="font-bold text-gray-900">Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="bg-gray-900 p-6 md:p-8 flex justify-between items-center text-white">
                    <span class="font-semibold text-gray-300">Total Keseluruhan</span>
                    <span
                        class="font-extrabold text-2xl text-orange-500">Rp{{ number_format($order->total_price, 0, ',', '.') }}</span>
                </div>
            </div>

            <div class="text-center">
                <a href="{{ route('restaurant.show', $order->restaurant->slug ?? '') }}"
                    class="text-sm font-semibold text-gray-500 hover:text-orange-500 transition">
                    &larr; Kembali ke Katalog Menu
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
