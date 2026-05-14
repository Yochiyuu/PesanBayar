<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'PesanBayar') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-white flex flex-col min-h-screen">

    <nav class="w-full bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center">
                    <span class="font-extrabold text-2xl text-orange-500 tracking-tight">PesanBayar</span>
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

    <main class="w-full flex-grow flex flex-col lg:flex-row min-h-[calc(100vh-4rem)]">
        <div class="w-full lg:w-1/2 flex justify-start items-center bg-white p-6 lg:p-12">
            <img src="{{ asset('images/test.png') }}" alt="Ilustrasi PesanBayar" class="w-full h-auto object-contain">
        </div>

        <div class="w-full lg:w-1/2 flex flex-col justify-center px-6 py-12 sm:px-12 lg:px-16 xl:px-24 bg-white">
            <h1
                class="text-[3rem] lg:text-[3.5rem] leading-[1.1] font-extrabold text-gray-900 mb-6 tracking-tight text-left">
                Pesan makan di meja<br>jadi lebih gampang!
            </h1>
            <p class="text-lg text-gray-800 font-medium mb-8 max-w-lg leading-relaxed text-left">
                Scan QR, pilih menu, dan bayar langsung dari HP kamu. Solusi cerdas untuk restoran modern dan pelanggan
                yang tidak suka menunggu.
            </p>
            <div class="flex items-center justify-start gap-4">
                <a href="#coba"
                    class="px-8 py-3.5 bg-orange-500 text-white font-semibold rounded-lg shadow-sm hover:bg-orange-600 transition">
                    Coba Pesan
                </a>
                <a href="{{ route('restaurant.create') }}"
                    class="px-8 py-3.5 bg-transparent border border-gray-900 text-gray-900 font-semibold rounded-lg hover:bg-gray-100 transition">
                    Daftarkan Resto
                </a>
            </div>
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
