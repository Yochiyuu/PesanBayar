<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $restaurant->name }} - Menu</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50 text-gray-900 pb-24">

    <header class="bg-white px-6 py-8 shadow-sm border-b border-gray-100 sticky top-0 z-10">
        <div class="max-w-3xl mx-auto flex flex-col justify-center items-center text-center">
            <h1 class="text-3xl font-extrabold tracking-tight">{{ $restaurant->name }}</h1>
            <p class="text-gray-500 text-sm mt-2 font-medium">
                {{ $restaurant->description ?? 'Selamat datang, silakan pilih pesanan Anda.' }}</p>
        </div>
    </header>

    <main class="max-w-3xl mx-auto px-4 sm:px-6 mt-8">
        @if (session('success'))
            <div class="mb-6 p-4 bg-black text-white text-sm font-semibold rounded-2xl shadow-md text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @forelse($restaurant->menus as $menu)
                <div
                    class="bg-white rounded-3xl p-5 border border-gray-100 shadow-sm flex gap-4 items-center transition hover:shadow-md">
                    <div class="w-24 h-24 flex-shrink-0 bg-gray-100 rounded-2xl overflow-hidden">
                        @if ($menu->image)
                            <img src="{{ asset('storage/' . $menu->image) }}" class="w-full h-full object-cover"
                                alt="{{ $menu->name }}">
                        @else
                            <div
                                class="w-full h-full flex items-center justify-center text-gray-400 text-xs font-medium">
                                No Image</div>
                        @endif
                    </div>

                    <div class="flex-grow">
                        <h3 class="font-bold text-lg leading-tight">{{ $menu->name }}</h3>
                        <p class="text-xs text-gray-500 mt-1 line-clamp-2">{{ $menu->description }}</p>
                        <p class="font-bold text-black mt-2">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                    </div>

                    <form action="{{ route('cart.add', $menu->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-10 h-10 bg-orange-500 text-white rounded-full flex items-center justify-center hover:bg-orange-600 transition shadow-sm font-bold text-xl pb-1">
                            +
                        </button>
                    </form>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-gray-500 font-medium">
                    Restoran ini belum memiliki menu.
                </div>
            @endforelse
        </div>
    </main>

    @php
        $cart = session()->get('cart', []);
        $totalItems = array_sum(array_column($cart, 'quantity'));
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
    @endphp

    @if ($totalItems > 0)
        <div class="fixed bottom-6 left-0 right-0 px-4 flex justify-center z-50">
            <a href="{{ route('cart.index') }}"
                class="w-full max-w-sm bg-black text-white px-6 py-4 rounded-full shadow-2xl flex justify-between items-center hover:scale-105 transition-transform duration-300">
                <div class="flex items-center gap-3">
                    <span
                        class="bg-orange-500 text-white text-xs font-bold px-2.5 py-1 rounded-full">{{ $totalItems }}</span>
                    <span class="font-semibold text-sm">Lihat Pesanan</span>
                </div>
                <span class="font-bold text-sm">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
            </a>
        </div>
    @endif

</body>

</html>
