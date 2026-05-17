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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center">
            <a href="/">
                <span class="text-2xl text-orange-500 tracking-tight">PesanBayar</span>
            </a>
        </div>
    </nav>

    <main class="flex-grow flex items-center justify-center py-12 bg-gray-50">
        <div
            class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg border border-gray-100">
            {{ $slot }}
        </div>
    </main>

    <footer class="w-full bg-gray-900 pt-16 pb-8 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-500 text-sm">
            <span class="text-orange-500 text-xl block mb-2">PesanBayar</span>
            <p>&copy; {{ date('Y') }} PesanBayar. Hak cipta dilindungi.</p>
        </div>
    </footer>
</body>

</html>
