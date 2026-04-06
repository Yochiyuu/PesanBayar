@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10">
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-2xl font-bold">Kelola Menu Restoran</h2>
            <a href="{{ route('menu.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Tambah Menu</a>
        </div>

        <div class="bg-white rounded shadow-md overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Nama Menu</th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Harga</th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Status</th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $menu)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">{{ $menu->name }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">Rp
                                {{ number_format($menu->price, 0, ',', '.') }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                {{ $menu->is_available ? 'Tersedia' : 'Habis' }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm flex space-x-2">
                                <a href="{{ route('menu.edit', $menu->id) }}"
                                    class="text-blue-500 hover:text-blue-800">Edit</a>
                                <form action="{{ route('menu.destroy', $menu->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus menu ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-800">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
