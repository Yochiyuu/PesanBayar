<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PesanBayar')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            font-family: -apple-system, BlinkMacSystemFont, "SF Pro Display", "Segoe UI", Roboto, sans-serif;
        }

        body {
            background: radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.06), transparent 40%),
                radial-gradient(circle at 80% 30%, rgba(255, 255, 255, 0.04), transparent 40%),
                #050505;
            color: #f5f5f7;
            -webkit-font-smoothing: antialiased;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        .glass {
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .glow:hover {
            box-shadow: 0 0 40px rgba(255, 255, 255, 0.08);
        }
    </style>
</head>

<body class="min-h-screen selection:bg-white selection:text-black">

    <!-- NAVBAR -->
    <div class="fixed top-6 left-1/2 -translate-x-1/2 z-50 w-[90%] max-w-3xl">
        <nav class="glass px-3 py-2 rounded-full flex justify-between items-center shadow-xl">

            <a href="/" class="pl-4 font-bold tracking-tight text-white flex items-center gap-2">
                <div class="w-2.5 h-2.5 bg-white rounded-full animate-pulse"></div>
                PesanBayar
            </a>

            <div class="hidden md:flex gap-1 text-sm text-gray-400">
                <a href="#" class="px-4 py-2 rounded-full hover:text-white hover:bg-white/10">Sistem</a>
                <a href="#" class="px-4 py-2 rounded-full hover:text-white hover:bg-white/10">Hardware</a>
                <a href="#" class="px-4 py-2 rounded-full hover:text-white hover:bg-white/10">Harga</a>
            </div>

            <a href="{{ route('restaurant.create') }}"
                class="bg-white text-black text-sm font-semibold px-5 py-2.5 rounded-full hover:scale-105 transition">
                Mulai
            </a>

        </nav>
    </div>

    <main>
        @yield('content')
    </main>

</body>

</html>
