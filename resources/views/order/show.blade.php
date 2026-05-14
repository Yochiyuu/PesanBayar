<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pesanan #{{ $order->id }} - PesanBayar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900">
    <div class="max-w-xl mx-auto px-4 py-12">

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-500 text-white font-bold rounded-2xl shadow-md text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 text-center mb-6">
            <h1 class="text-2xl font-extrabold mb-2">Pesanan Diterima!</h1>
            <p class="text-gray-500 mb-6">Terima kasih <b>{{ $order->customer_name }}</b>, pesanan kamu untuk Meja
                <b>{{ $order->table_number }}</b> sedang disiapkan.
            </p>

            <div
                class="inline-block px-4 py-2 rounded-full font-bold text-sm mb-6
                {{ $order->payment_status == 'paid' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                Status Pembayaran: {{ strtoupper($order->payment_status) }}
            </div>

            <h2 class="text-4xl font-black text-orange-500">Rp {{ number_format($order->total_price, 0, ',', '.') }}
            </h2>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-100 font-bold">Rincian Pesanan</div>
            <div class="p-6 space-y-4">
                @foreach ($order->items as $item)
                    <div class="flex justify-between items-center">
                        <div class="flex gap-3">
                            <span class="font-bold">{{ $item->quantity }}x</span>
                            <span class="text-gray-700">{{ $item->menu->name }}</span>
                        </div>
                        <span class="font-bold">Rp
                            {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-8 text-center">
            <button
                class="w-full bg-black text-white py-4 rounded-full font-bold shadow-xl opacity-50 cursor-not-allowed">
                Bayar Sekarang (Coming Soon)
            </button>
        </div>

    </div>
</body>

</html>
