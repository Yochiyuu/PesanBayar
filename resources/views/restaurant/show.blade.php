@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10">
        <div class="bg-white p-6 rounded shadow-md mb-8">
            <h1 class="text-3xl font-bold mb-2">{{ $restaurant->name }}</h1>
            <p class="text-gray-600">{{ $restaurant->description }}</p>
        </div>

        <h2 class="text-2xl font-bold mb-5">Daftar Menu Tersedia</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($restaurant->menus as $menu)
                <div class="bg-white rounded shadow-md p-4">
                    @if ($menu->image)
                        <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}"
                            class="w-full h-48 object-cover rounded mb-4">
                    @endif
                    <h3 class="text-xl font-bold">{{ $menu->name }}</h3>
                    <p class="text-gray-600 text-sm mb-2">{{ $menu->description }}</p>
                    <p class="text-lg font-bold text-green-600 mb-4">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>

                    <button class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">
                        Pesan
                    </button>
                </div>
            @empty
                <p class="text-gray-500 col-span-3">Restoran ini belum memiliki menu yang tersedia.</p>
            @endforelse
        </div>
    </div>
@endsection
