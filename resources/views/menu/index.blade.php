<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Menu - {{ config('app.name', 'PesanBayar') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-900 bg-gray-50 flex flex-col">

    <nav class="w-full bg-white border-b border-gray-100 shadow-sm h-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ url('/') }}"
                        class="font-extrabold text-2xl text-orange-500 tracking-tight">PesanBayar</a>
                </div>
                <div class="flex space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="text-gray-600 hover:text-orange-500 font-semibold transition px-3 py-2">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-gray-700 hover:text-orange-500 font-semibold transition px-3 py-2">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="bg-orange-500 text-white px-5 py-2 rounded-lg font-semibold hover:bg-orange-600 shadow-sm transition">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main class="w-full min-h-[calc(100vh-4rem)] py-12 px-4 sm:px-6 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Kelola Menu</h1>
                <p class="text-gray-500 mt-1 font-medium">Daftar menu aktif untuk restoran <span
                        class="text-orange-500">{{ $restaurant->name }}</span></p>
            </div>
            <a href="{{ route('menu.create') }}"
                class="inline-flex items-center bg-orange-500 text-white px-7 py-3 rounded-full font-bold shadow-lg shadow-orange-200 hover:bg-orange-600 hover:-translate-y-0.5 transition-all">
                <span class="mr-2">+</span> Tambah Menu Baru
            </a>
        </div>

        @if (session('success'))
            <div class="mb-8 p-4 bg-gray-900 text-white font-semibold rounded-2xl shadow-md flex items-center">
                <span class="mr-2">✓</span> {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @forelse($menus as $menu)
                <div
                    class="group bg-white rounded-[2rem] p-4 border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300">
                    <div class="w-full h-48 bg-gray-50 rounded-2xl overflow-hidden mb-4">
                        @if ($menu->image)
                            <img src="{{ asset('storage/' . $menu->image) }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                alt="{{ $menu->name }}">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400 font-medium">No
                                Image</div>
                        @endif
                    </div>
                    <div class="px-2 pb-2">
                        <h3 class="font-bold text-xl text-gray-900">{{ $menu->name }}</h3>
                        <p class="text-sm text-gray-500 line-clamp-2 mt-1 leading-relaxed">{{ $menu->description }}</p>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-xl font-black text-gray-900">Rp
                                {{ number_format($menu->price, 0, ',', '.') }}</span>
                            <span
                                class="text-[10px] uppercase tracking-widest font-bold px-2 py-1 bg-gray-100 rounded-md {{ $menu->is_available ? 'text-green-600' : 'text-red-600' }}">
                                {{ $menu->is_available ? 'Tersedia' : 'Habis' }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div
                    class="col-span-full py-20 bg-white rounded-[3rem] border-2 border-dashed border-gray-200 flex flex-col items-center justify-center">
                    <p class="text-gray-400 font-semibold text-lg">Belum ada menu yang dibuat.</p>
                    <a href="{{ route('menu.create') }}" class="mt-4 text-orange-500 font-bold hover:underline">Klik di
                        sini untuk membuat menu pertama</a>
                </div>
            @endforelse
        </div>
    </main>

    <footer class="w-full bg-gray-900 pt-16 pb-8 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="col-span-1 md:col-span-2">
                    <span class="font-extrabold text-3xl text-orange-500 tracking-tight block mb-4">PesanBayar</span>
                    <p class="text-gray-400 text-sm leading-relaxed max-w-sm">
                        Solusi modern pemesanan makanan berbasis QR Code. Tingkatkan efisiensi restoran Anda dan berikan
                        pengalaman terbaik bagi pelanggan tanpa perlu antre.
                    </p>
                </div>

                <div>
                    <h3 class="text-white font-semibold mb-4 tracking-wide">Perusahaan</h3>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-orange-500 transition">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition">Fitur & Harga</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition">Karir</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white font-semibold mb-4 tracking-wide">Dukungan</h3>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-orange-500 transition">Pusat Bantuan</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition">Kebijakan Privasi</a></li>
                    </ul>
                </div>
            </div>

            <div
                class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
                <p>&copy; {{ date('Y') }} PesanBayar. Hak cipta dilindungi.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-white transition">Twitter</a>
                    <a href="#" class="hover:text-white transition">Instagram</a>
                    <a href="#" class="hover:text-white transition">LinkedIn</a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
