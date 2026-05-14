<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PesanBayar') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex bg-white">

        <div class="hidden lg:flex lg:w-1/2 bg-indigo-900 items-center justify-center relative overflow-hidden">
            <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
                alt="Restaurant Cover" class="absolute inset-0 w-full h-full object-cover opacity-40 mix-blend-overlay">

            <div class="relative z-10 text-center px-12">
                <h1 class="text-5xl font-bold text-white mb-6 tracking-tight">PesanBayar</h1>
                <p class="text-lg text-indigo-100 font-medium">Solusi cerdas untuk manajemen pesanan dan pembayaran
                    restoran Anda secara real-time.</p>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex flex-col justify-center items-center px-6 py-12 lg:px-12 bg-gray-50">
            <div class="w-full sm:max-w-md">
                <div class="flex justify-center mb-8 lg:hidden">
                    <a href="/">
                        <x-application-logo class="w-24 h-24 fill-current text-indigo-600" />
                    </a>
                </div>

                <div class="mb-8 text-center lg:text-left">
                    <h2 class="text-3xl font-bold text-gray-900">Buat Akun Baru</h2>
                    <p class="mt-2 text-sm text-gray-600">Daftar untuk mulai mengelola restoran dan pesanan.</p>
                </div>

                <div class="px-8 py-10 bg-white shadow-xl shadow-gray-200/50 sm:rounded-2xl border border-gray-100">
                    {{ $slot }}
                </div>
            </div>
        </div>

    </div>
</body>

</html>
