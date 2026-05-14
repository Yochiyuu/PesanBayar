<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Menu - PesanBayar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900 flex flex-col min-h-screen">

    <nav class="w-full bg-white border-b border-gray-100 shadow-sm h-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between h-16 items-center">
            <a href="{{ url('/') }}" class="font-extrabold text-2xl text-orange-500 tracking-tight">PesanBayar</a>
            <a href="{{ route('menu.index') }}"
                class="text-gray-600 hover:text-orange-500 font-semibold transition px-3 py-2">Kembali</a>
        </div>
    </nav>

    <main class="w-full min-h-[calc(100vh-4rem)] flex justify-center items-center py-12 px-4 sm:px-6">
        <div class="w-full max-w-2xl bg-white shadow-sm rounded-3xl border border-gray-100 p-8 sm:p-12">

            <div class="mb-8 text-center sm:text-left">
                <h2 class="text-3xl font-extrabold text-gray-900">Tambah Menu Baru</h2>
                <p class="text-gray-500 mt-2 text-sm">Masukkan detail makanan atau minuman yang ingin dijual.</p>
            </div>

            <form method="POST" action="{{ route('menu.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Nama Menu</label>
                    <input type="text" name="name" required
                        class="block w-full px-4 py-3 border border-gray-300 rounded-2xl focus:ring-orange-500 focus:border-orange-500">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Harga (Rp)</label>
                    <input type="number" name="price" required
                        class="block w-full px-4 py-3 border border-gray-300 rounded-2xl focus:ring-orange-500 focus:border-orange-500">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Deskripsi Singkat</label>
                    <textarea name="description" rows="3"
                        class="block w-full px-4 py-3 border border-gray-300 rounded-2xl focus:ring-orange-500 focus:border-orange-500"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Foto Menu (Opsional)</label>
                    <input type="file" name="image" accept="image/*"
                        class="block w-full px-4 py-3 border border-gray-300 rounded-2xl">
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-orange-500 text-white font-bold py-3.5 rounded-full shadow-lg hover:bg-orange-600 transition">
                        Simpan Menu
                    </button>
                </div>
            </form>

        </div>
    </main>

    <footer class="w-full bg-gray-900 pt-8 pb-8 border-t border-gray-800 text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} PesanBayar. Hak cipta dilindungi.
    </footer>

</body>

</html>
