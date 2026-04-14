<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - {{ config('app.name', 'PesanBayar') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-900 bg-white">

    <div class="min-h-screen flex">
        <div class="w-full lg:w-1/2 flex flex-col justify-center items-center px-6 py-12 sm:px-12 bg-white">
            <div class="w-full max-w-md">

                <div class="mb-10 text-center lg:text-left">
                    <a href="{{ url('/') }}"
                        class="inline-block font-extrabold text-3xl text-orange-500 tracking-tight mb-2">PesanBayar</a>
                    <h2 class="text-2xl font-bold text-gray-900 mt-4">Selamat datang kembali!</h2>
                    <p class="text-gray-500 text-sm mt-1">Silakan masukkan detail akun Anda untuk masuk.</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            autofocus autocomplete="username"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 transition">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 transition">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="flex items-center cursor-pointer">
                            <input id="remember_me" type="checkbox" name="remember"
                                class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 focus:ring-2 cursor-pointer">
                            <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="text-sm font-medium text-orange-500 hover:text-orange-600 transition">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-orange-500 hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition">
                            Log in
                        </button>
                    </div>
                </form>

                <p class="mt-8 text-center text-sm text-gray-600">
                    Belum punya akun?
                    <a href="{{ route('register') }}"
                        class="font-medium text-orange-500 hover:text-orange-600 transition">Daftar sekarang</a>
                </p>
            </div>
        </div>

        <div class="hidden lg:flex w-1/2 bg-orange-50 justify-center items-center">
            <div class="max-w-lg p-12 text-center">
                <img src="{{ asset('images/test.png') }}" alt="Ilustrasi Manajemen Restoran"
                    class="w-full h-auto object-contain mb-8 mix-blend-multiply">
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Kelola Restoran Lebih Mudah</h3>
                <p class="text-gray-600">Pantau pesanan, atur menu, dan terima pembayaran dengan cepat tanpa repot.</p>
            </div>
        </div>
    </div>

</body>

</html>
