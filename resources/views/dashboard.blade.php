<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition.opacity.duration.500ms
                    class="p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg font-medium text-sm flex items-center shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="p-6 md:p-8 text-gray-900 text-base font-medium">
                    Selamat datang kembali, {{ Auth::user()->name }}! 👋
                </div>
            </div>

            @if ($restaurant)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 p-6 md:p-8">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div>
                            <div class="flex items-center gap-3 mb-1">
                                <span
                                    class="text-xs font-semibold text-orange-500 uppercase tracking-wider block">Restoran
                                    Anda</span>
                            </div>
                            <h3 class="text-2xl font-semibold text-gray-900 mt-1">{{ $restaurant->name }}</h3>
                            @if ($restaurant->description)
                                <p class="text-sm text-gray-500 mt-1 max-w-xl">
                                    {{ $restaurant->description }}
                                </p>
                            @endif
                        </div>
                        <div class="w-full sm:w-auto flex flex-wrap gap-3">
                            <a href="{{ route('restaurant.edit') }}"
                                class="inline-flex items-center justify-center bg-gray-900 text-white px-5 py-2.5 rounded-lg font-semibold text-sm hover:bg-gray-800 shadow-sm transition gap-2">
                                Pengaturan Restoran
                            </a>
                            <a href="{{ route('restaurant.show', $restaurant->slug) }}" target="_blank"
                                class="inline-flex items-center justify-center bg-white border border-gray-300 text-gray-700 px-5 py-2.5 rounded-lg font-semibold text-sm hover:bg-gray-50 shadow-sm transition gap-2">
                                Buka Katalog Menu
                            </a>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-4 mt-8 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                            Pesanan Masuk
                        </div>

                        <!-- Indikator Live Update -->
                        <div
                            class="flex items-center gap-2 text-xs font-semibold text-gray-500 bg-white px-3 py-1.5 rounded-full border border-gray-200 shadow-sm">
                            <span class="relative flex h-2.5 w-2.5">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-orange-500"></span>
                            </span>
                            Live Update
                        </div>
                    </h3>

                    @php
                        // Membuat hash / sidik jari data pesanan.
                        // Kalau pesanan berubah (ada yang nambah, atau statusnya diganti), hash ini otomatis berubah.
                        $ordersHash = isset($orders)
                            ? md5($orders->pluck('id')->join(',') . $orders->pluck('order_status')->join(','))
                            : '';
                    @endphp

                    <!-- BUNGKUSAN DATA PESANAN YANG AKAN DI-REFRESH OTOMATIS -->
                    <div id="orders-wrapper" data-hash="{{ $ordersHash }}">
                        @if (isset($orders) && $orders->count() > 0)
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach ($orders as $order)
                                    <div @if ($order->order_status === 'selesai') x-data="{
                                                secondsLeft: Math.floor({{ max(0, round(\Carbon\Carbon::now()->diffInSeconds($order->updated_at->addMinutes(5), false))) }}),
                                                show: true,
                                                formatTime() {
                                                    let total = Math.floor(this.secondsLeft);
                                                    let m = Math.floor(total / 60);
                                                    let s = total % 60;
                                                    return m + 'm ' + s + 's';
                                                },
                                                init() {
                                                    if(this.secondsLeft > 0) {
                                                        let interval = setInterval(() => {
                                                            this.secondsLeft--;
                                                            if(this.secondsLeft <= 0) {
                                                                this.show = false;
                                                                clearInterval(interval);
                                                            }
                                                        }, 1000);
                                                    } else {
                                                        this.show = false;
                                                    }
                                                }
                                            }"
                                            x-show="show"
                                            x-transition.duration.500ms @endif
                                        class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col relative">

                                        <div
                                            class="absolute top-0 left-0 w-full h-1 
                                            {{ $order->order_status === 'pending' ? 'bg-yellow-400' : ($order->order_status === 'proses' ? 'bg-blue-400' : 'bg-green-400') }}">
                                        </div>

                                        @if ($order->order_status === 'selesai')
                                            <div
                                                class="bg-green-100 text-green-800 text-xs font-bold text-center py-2 mt-3 mx-4 rounded-md border border-green-200">
                                                Pindah ke riwayat dalam <span x-text="formatTime()"></span>
                                            </div>
                                        @endif

                                        <div class="p-5 border-b border-gray-50 flex justify-between items-start mt-1">
                                            <div>
                                                <p class="text-xs text-gray-400 font-medium mb-0.5">
                                                    {{ $order->created_at->format('d M H:i') }}
                                                    ({{ $order->created_at->diffForHumans() }})
                                                </p>
                                                <h4 class="font-bold text-gray-900 text-lg">{{ $order->customer_name }}
                                                </h4>
                                                <p class="text-xs text-gray-500">Meja: {{ $order->table_number }}</p>
                                            </div>
                                            <span
                                                class="font-extrabold text-orange-500 bg-orange-50 px-2 py-1 rounded-md text-sm border border-orange-100">
                                                Rp{{ number_format($order->total_price, 0, ',', '.') }}
                                            </span>
                                        </div>

                                        <div class="p-5 flex-grow bg-gray-50/30">
                                            <ul class="space-y-3">
                                                @foreach ($order->items as $item)
                                                    <li class="flex items-start gap-3 text-sm">
                                                        <span
                                                            class="font-bold text-gray-900 bg-white border border-gray-200 w-6 h-6 flex items-center justify-center rounded text-xs shadow-sm">
                                                            {{ $item->quantity }}
                                                        </span>
                                                        <span
                                                            class="text-gray-700 leading-tight pt-0.5">{{ $item->menu->name ?? 'Menu Dihapus' }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div class="p-4 border-t border-gray-100 bg-white">
                                            <form action="{{ route('order.update-status', $order->id) }}"
                                                method="POST" class="flex gap-2">
                                                @csrf
                                                @method('PATCH')
                                                <select name="order_status"
                                                    class="block w-full border-gray-300 rounded-lg text-sm focus:ring-orange-500 focus:border-orange-500 font-medium text-gray-700">
                                                    <option value="pending"
                                                        {{ $order->order_status === 'pending' ? 'selected' : '' }}>⏳
                                                        Menunggu Konfirmasi</option>
                                                    <option value="proses"
                                                        {{ $order->order_status === 'proses' ? 'selected' : '' }}>🍳
                                                        Sedang
                                                        Dimasak</option>
                                                    <option value="selesai"
                                                        {{ $order->order_status === 'selesai' ? 'selected' : '' }}>✅
                                                        Selesai / Diambil</option>
                                                </select>
                                                <button type="submit"
                                                    class="bg-gray-900 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-gray-800 transition shadow-sm">
                                                    Update
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-16 text-center">
                                <div
                                    class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 border border-gray-100">
                                    <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-1">Belum ada pesanan masuk</h4>
                                <p class="text-sm text-gray-500">Tunggu sejenak, pesanan dari pelanggan akan otomatis
                                    muncul
                                    di sini secara real-time.</p>
                            </div>
                        @endif
                    </div>
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 p-8 text-center">
                    <p class="text-gray-600 mb-4">Anda belum memiliki restoran.</p>
                    <a href="{{ route('restaurant.create') }}"
                        class="bg-orange-500 text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-orange-600 transition shadow-sm">
                        Daftarkan Restoran Sekarang
                    </a>
                </div>
            @endif

        </div>
    </div>

   @if($restaurant)
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lakukan pengecekan setiap 5 detik (5000 milidetik)
            setInterval(() => {
                fetch(window.location.href, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    
                    const newWrapper = doc.getElementById('orders-wrapper');
                    const currentWrapper = document.getElementById('orders-wrapper');
                    
                    if (newWrapper && currentWrapper) {
                        const newHash = newWrapper.getAttribute('data-hash');
                        const currentHash = currentWrapper.getAttribute('data-hash');
                        
                        if (newHash !== currentHash) {
                            currentWrapper.innerHTML = newWrapper.innerHTML;
                            currentWrapper.setAttribute('data-hash', newHash);
                        }
                    }
                })
                .catch(error => console.error('Error fetching real-time orders:', error));
            }, 5000); // <--- UBAH DI SINI JADI 5000
        });
    </script>
    @endif
</x-app-layout>
