<x-app-layout>
    @if ($restaurant->banner)
        <div class="relative w-full h-48 md:h-64 bg-gray-150 overflow-hidden">
            <img src="{{ asset('storage/' . $restaurant->banner) }}" alt="Banner {{ $restaurant->name }}"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/10"></div>
        </div>
    @else
        <div class="relative w-full h-48 md:h-64 bg-gradient-to-r from-orange-500 to-amber-600 overflow-hidden">
            <div
                class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]">
            </div>
        </div>
    @endif

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 md:-mt-24 relative z-10 mb-8">
        <div
            class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 md:p-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="space-y-3 w-full">
                <div class="flex flex-wrap items-center gap-3">
                    <h1 class="font-extrabold text-2xl md:text-3xl text-gray-900 tracking-tight">{{ $restaurant->name }}
                    </h1>

                    @if ($restaurant->is_open)
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-50 text-green-700 border border-green-200">
                            ● Buka
                        </span>
                    @else
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-red-50 text-red-700 border border-red-200">
                            ● Tutup
                        </span>
                    @endif
                </div>

                @if ($restaurant->description)
                    <p class="text-gray-600 text-sm md:text-base max-w-2xl leading-relaxed">
                        {{ $restaurant->description }}</p>
                @endif

                <div
                    class="flex flex-wrap items-center gap-y-2 gap-x-4 text-xs font-medium text-gray-500 pt-1 border-t border-gray-50 mt-2">
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        4.8 (50+ rating)
                    </span>
                    <span class="text-gray-300 hidden sm:inline">•</span>
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        10 - 20 mnt waktu saji
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">

        @php
            // Kumpulkan Kategori Secara Dinamis Berdasarkan Menu yang Dimiliki Restoran
            $groupedMenus = $restaurant->menus->groupBy('category');
        @endphp

        <div
            class="border-b border-gray-200 mb-8 overflow-x-auto flex gap-6 text-sm font-medium whitespace-nowrap scrollbar-none">
            <button class="border-b-2 border-orange-500 text-orange-600 pb-4 px-1 font-semibold">Semua Menu</button>
            @foreach ($groupedMenus as $categoryName => $items)
                <button class="text-gray-400 hover:text-gray-600 pb-4 px-1 transition">{{ $categoryName }}</button>
            @endforeach
        </div>

        @forelse ($groupedMenus as $categoryName => $menus)
            <div class="mb-12">
                <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                    <span class="w-1.5 h-6 bg-orange-500 rounded-full"></span>
                    {{ $categoryName }}
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($menus as $menu)
                        <div
                            class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col hover:shadow-md hover:-translate-y-1 transition duration-200 group">

                            <div class="relative overflow-hidden bg-gray-50 aspect-[4/3] w-full">
                                @if ($menu->image)
                                    <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                @else
                                    <div
                                        class="w-full h-full flex flex-col items-center justify-center border-b border-gray-100 text-gray-300">
                                        <svg class="w-10 h-10 mb-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                            </path>
                                        </svg>
                                        <span class="text-[9px] font-bold tracking-widest uppercase">PesanBayar</span>
                                    </div>
                                @endif
                            </div>

                            <div class="p-5 flex-grow flex flex-col justify-between">
                                <div>
                                    <div class="flex justify-between items-start mb-2 gap-2">
                                        <h3
                                            class="font-bold text-gray-900 text-base group-hover:text-orange-500 transition line-clamp-1">
                                            {{ $menu->name }}</h3>
                                        <span
                                            class="font-extrabold text-orange-500 whitespace-nowrap text-base">Rp{{ number_format($menu->price, 0, ',', '.') }}</span>
                                    </div>
                                    @if ($menu->description)
                                        <p class="text-sm text-gray-500 line-clamp-2 min-h-[40px] leading-relaxed">
                                            {{ $menu->description }}</p>
                                    @else
                                        <p class="text-sm text-gray-400 italic line-clamp-2 min-h-[40px]">Hidangan lezat
                                            racikan khas restoran kami.</p>
                                    @endif
                                </div>

                                <div class="mt-4 pt-4 border-t border-gray-50">
                                    @if ($restaurant->is_open && $menu->is_available)
                                        <form action="{{ route('cart.add', $menu->id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="w-full bg-orange-50 hover:bg-orange-500 text-orange-600 hover:text-white font-semibold py-2.5 rounded-xl transition text-sm flex items-center justify-center gap-2 border border-orange-100 hover:border-transparent shadow-sm">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M12 4v16m8-8H4"></path>
                                                </svg>
                                                Tambah ke Pesanan
                                            </button>
                                        </form>
                                    @else
                                        <button disabled
                                            class="w-full bg-gray-100 text-gray-400 font-semibold py-2.5 rounded-xl text-sm cursor-not-allowed border border-gray-200/50">
                                            {{ !$restaurant->is_open ? 'Toko Tutup' : 'Stok Habis' }}
                                        </button>
                                    @endif
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="text-center py-20 bg-white rounded-2xl border border-gray-100 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-900 mb-1">Belum ada menu tersedia</h3>
                <p class="text-gray-500 text-sm">Restoran ini sedang menyiapkan hidangan terbaik mereka.</p>
            </div>
        @endforelse
    </div>
</x-app-layout>
