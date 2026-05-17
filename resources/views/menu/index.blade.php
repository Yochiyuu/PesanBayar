<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-900 leading-tight">
                {{ __('Kelola Menu') }}
            </h2>
            <a href="{{ route('menu.create') }}"
                class="bg-orange-500 text-white px-5 py-2.5 rounded-lg font-semibold text-sm hover:bg-orange-600 shadow-sm transition">
                + Tambah Menu
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div
                    class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg font-medium text-sm flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="p-6 md:p-8">
                    @if (isset($menus) && $menus->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr
                                        class="border-b border-gray-100 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        <th class="pb-4 pl-4">Menu</th>
                                        <th class="pb-4">Harga</th>
                                        <th class="pb-4 hidden md:table-cell">Deskripsi</th>
                                        <th class="pb-4 pr-4 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50">
                                    @foreach ($menus as $menu)
                                        <tr class="hover:bg-gray-50/50 transition duration-150">
                                            <td class="py-4 pl-4">
                                                <div class="flex items-center gap-4">
                                                    @if ($menu->image)
                                                        <img src="{{ asset('storage/' . $menu->image) }}"
                                                            alt="{{ $menu->name }}"
                                                            class="w-12 h-12 rounded-lg object-cover border border-gray-100 shadow-sm">
                                                    @else
                                                        <div
                                                            class="w-12 h-12 rounded-lg bg-gray-50 flex items-center justify-center border border-gray-100">
                                                            <span
                                                                class="text-gray-400 text-[10px] uppercase font-bold tracking-wider">No
                                                                Img</span>
                                                        </div>
                                                    @endif
                                                    <span
                                                        class="font-semibold text-gray-900 text-sm">{{ $menu->name }}</span>
                                                </div>
                                            </td>
                                            <td class="py-4 text-gray-700 font-medium text-sm">
                                                Rp{{ number_format($menu->price, 0, ',', '.') }}
                                            </td>
                                            <td
                                                class="py-4 text-gray-500 text-sm hidden md:table-cell max-w-xs truncate">
                                                {{ $menu->description ?: '-' }}
                                            </td>
                                            <td class="py-4 pr-4 text-right space-x-3">
                                                <a href="{{ route('menu.edit', $menu->id) }}"
                                                    class="text-sm font-semibold text-blue-600 hover:text-blue-800 transition">Edit</a>

                                                <form action="{{ route('menu.destroy', $menu->id) }}" method="POST"
                                                    class="inline-block"
                                                    onsubmit="return confirm('Yakin ingin menghapus menu ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-sm font-semibold text-red-600 hover:text-red-800 transition">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-16">
                            <div
                                class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-orange-50 mb-4">
                                <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Belum ada menu</h3>
                            <p class="text-gray-500 text-sm mb-6 max-w-sm mx-auto">Mulai tambahkan menu pertama Anda
                                agar pelanggan bisa langsung memesan dari meja mereka.</p>
                            <a href="{{ route('menu.create') }}"
                                class="inline-block bg-white border border-gray-300 text-gray-700 px-6 py-2.5 rounded-lg font-semibold text-sm hover:bg-gray-50 shadow-sm transition">
                                Tambah Menu Pertama
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
