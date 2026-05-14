<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atur Ulang Password - {{ config('app.name', 'PesanBayar') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-white flex flex-col min-h-screen">
    <nav class="w-full bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ url('/') }}"
                        class="font-extrabold text-2xl text-orange-500 tracking-tight">PesanBayar</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow flex flex-col lg:flex-row min-h-screen">
        <div class="w-full lg:w-1/2 flex flex-col justify-center items-center px-6 py-12 sm:px-12 bg-white">
            <div class="w-full max-w-md">
                <div class="mb-10 text-center lg:text-left">
                    <h2 class="text-3xl font-bold text-gray-900">Buat Password Baru</h2>
                    <p class="text-gray-500 text-sm mt-2 leading-relaxed">Silakan masukkan password baru untuk akun
                        Anda.</p>
                </div>

                <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email', $request->email) }}" required
                            autofocus
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 transition"
                            placeholder="nama@email.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                        <input type="password" name="password" required
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 transition"
                            placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" required
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 transition"
                            placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <button type="submit"
                        class="w-full py-3.5 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition shadow-sm">Simpan
                        Password Baru</button>
                </form>
            </div>
        </div>

        <div class="hidden lg:flex w-1/2 bg-orange-50 justify-center items-center">
            <div class="max-w-lg p-12 text-center">
                <img src="{{ asset('images/test.png') }}" class="w-full h-auto object-contain mb-8 mix-blend-multiply">
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Keamanan Akun Terjamin</h3>
                <p class="text-gray-600">Pastikan Anda menggunakan kombinasi huruf dan angka agar password Anda semakin
                    kuat.</p>
            </div>
        </div>
    </main>

    <footer class="w-full bg-gray-900 pt-16 pb-8 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="col-span-1 md:col-span-2">
                    <span class="font-extrabold text-3xl text-orange-500 tracking-tight block mb-4">PesanBayar</span>
                    <p class="text-gray-400 text-sm leading-relaxed max-w-sm">Solusi modern pemesanan makanan berbasis
                        QR Code. Tingkatkan efisiensi restoran Anda.</p>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-4">Perusahaan</h3>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-orange-500 transition">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition">Fitur & Harga</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-4">Dukungan</h3>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-orange-500 transition">Pusat Bantuan</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
            </div>
            <div
                class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
                <p>&copy; {{ date('Y') }} PesanBayar. Hak cipta dilindungi.</p>
            </div>
        </div>
    </footer>
</body>

</html>
