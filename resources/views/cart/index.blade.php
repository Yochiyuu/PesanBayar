<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Keranjang Pesanan - PesanBayar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900 pb-12">
    <div class="max-w-2xl mx-auto px-4 pt-10">
        <h1 class="text-3xl font-extrabold mb-8">Pesanan Kamu</h1>

        @if (count($cart) > 0)
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden mb-8">
                @foreach ($cart as $id => $details)
                    <div class="flex items-center justify-between p-5 border-b border-gray-50">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-gray-100 rounded-2xl overflow-hidden">
                                @if ($details['image'])
                                    <img src="{{ asset('storage/' . $details['image']) }}"
                                        class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">{{ $details['name'] }}</h3>
                                <p class="text-gray-500 font-bold">Rp
                                    {{ number_format($details['price'], 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="font-bold text-lg">{{ $details['quantity'] }}x</span>
                        </div>
                    </div>
                @endforeach

                <div class="p-6 bg-gray-50 flex justify-between items-center">
                    <span class="text-gray-600 font-medium">Total Pembayaran</span>
                    <span class="text-2xl font-black text-orange-500">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
            </div>

            <form action="{{ route('order.store', $restaurant_id) }}" method="POST" class="space-y-6">
                @csrf
                <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm space-y-4">
                    <h2 class="text-xl font-bold">Informasi Meja</h2>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Nama Pemesan</label>
                        <input type="text" name="customer_name" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-2xl focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Nomor Meja</label>
                        <input type="number" name="table_number" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-2xl focus:ring-orange-500 focus:border-orange-500">
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-black text-white py-5 rounded-full font-bold text-lg shadow-xl hover:scale-105 transition-transform">
                    Pesan & Bayar Sekarang
                </button>
            </form>
        @else
            <div class="text-center py-20">
                <p class="text-gray-500 mb-6">Keranjang kamu masih kosong nih.</p>
                <a href="/" class="px-8 py-3 bg-orange-500 text-white font-bold rounded-full">Cari Makan</a>
            </div>
        @endif
    </div>
</body>

</html>
