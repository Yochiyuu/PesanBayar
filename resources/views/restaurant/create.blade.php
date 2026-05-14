<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Restoran - {{ config('app.name', 'PesanBayar') }}</title>
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
                    <a href="{{ route('dashboard') }}"
                        class="text-gray-600 hover:text-orange-500 font-semibold transition px-3 py-2">Dashboard</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="w-full min-h-[calc(100vh-4rem)] flex justify-center items-center py-12 px-4 sm:px-6">
        <div class="w-full max-w-3xl bg-white shadow-sm rounded-3xl border border-gray-100 p-8 sm:p-12">

            <div class="mb-8 text-center sm:text-left">
                <h2 class="text-3xl font-extrabold text-gray-900">Mulai Perjalanan Bisnismu</h2>
                <p class="text-gray-500 mt-2 text-sm">Lengkapi detail di bawah ini agar pelanggan bisa mengenali
                    restoranmu saat melakukan scan QR Code.</p>
            </div>

            <form method="POST" action="{{ route('restaurant.store') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-bold text-gray-700 mb-1">Nama Restoran /
                        Warung</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        class="block w-full px-4 py-3 border border-gray-300 rounded-2xl shadow-sm focus:ring-orange-500 focus:border-orange-500 transition"
                        placeholder="Contoh: Warung Indomie Tomang">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <label for="description" class="block text-sm font-bold text-gray-700 mb-1">Deskripsi Singkat
                        (Opsional)</label>
                    <textarea id="description" name="description" rows="4"
                        class="block w-full px-4 py-3 border border-gray-300 rounded-2xl shadow-sm focus:ring-orange-500 focus:border-orange-500 transition"
                        placeholder="Contoh: Menyediakan berbagai macam nasi goreng dan minuman segar.">{{ old('description') }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full sm:w-auto px-8 py-3.5 bg-orange-500 text-white font-bold rounded-full shadow-lg shadow-orange-200 hover:bg-orange-600 hover:-translate-y-0.5 transition-all duration-200">
                        Simpan & Buka Restoran
                    </button>
                </div>
            </form>

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
