@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10 max-w-2xl">
        <h2 class="text-2xl font-bold mb-5">Daftar Restoran Baru</h2>

        <form action="{{ route('restaurant.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Nama Restoran</label>
                <input type="text" name="name" class="w-full border p-2 rounded" required
                    placeholder="Contoh: Warung Barokah">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Deskripsi (Opsional)</label>
                <textarea name="description" class="w-full border p-2 rounded" rows="4"
                    placeholder="Jelaskan tentang restoranmu..."></textarea>
            </div>

            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">
                Daftar Restoran
            </button>
        </form>
    </div>
@endsection
