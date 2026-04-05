<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PesanBayar')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 antialiased flex flex-col min-h-screen">

    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-20">
            <a href="/" class="text-2xl font-bold text-indigo-600 tracking-tight">PesanBayar.</a>
            <div class="flex items-center space-x-6">
                <a href="/" class="text-slate-600 hover:text-indigo-600 font-medium transition">Beranda</a>
                <a href="{{ route('restaurant.create') }}"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-lg font-medium transition-all shadow-sm">Daftar
                    Resto</a>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-white border-t border-slate-200 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-6 md:mb-0 text-center md:text-left">
                    <span class="text-2xl font-bold text-indigo-600">PesanBayar.</span>
                    <p class="text-sm text-slate-500 mt-2">Sistem kasir dan pemesanan restoran masa depan.</p>
                </div>
                <div class="flex space-x-8 text-sm text-slate-600 font-medium">
                    <a href="#" class="hover:text-indigo-600 transition">Tentang Kami</a>
                    <a href="#" class="hover:text-indigo-600 transition">Fitur</a>
                    <a href="#" class="hover:text-indigo-600 transition">Kontak</a>
                </div>
            </div>
            <div class="border-t border-slate-100 mt-8 pt-8 text-center text-sm text-slate-400">
                &copy; {{ date('Y') }} PesanBayar. Hak Cipta Dilindungi.
            </div>
        </div>
    </footer>

</body>

</html>
