@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10 max-w-2xl">
        <h2 class="text-2xl font-bold mb-5">Tambah Menu Baru</h2>

        <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded shadow-md">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Nama Menu</label>
                <input type="text" name="name" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                <textarea name="description" class="w-full border p-2 rounded" rows="3"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Harga (Rp)</label>
                <input type="number" name="price" class="w-full border p-2 rounded" required min="0">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Gambar Menu</label>
                <input type="file" name="image" class="w-full border p-2 rounded" accept="image/*">
            </div>

            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="is_available" class="form-checkbox" checked>
                    <span class="ml-2">Tersedia untuk dipesan</span>
                </label>
            </div>

            <button type="submit" class="bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600">
                Simpan Menu
            </button>
        </form>
    </div>
@endsection
