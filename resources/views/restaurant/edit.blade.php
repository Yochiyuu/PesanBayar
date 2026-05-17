<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            {{ __('Pengaturan Restoran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-xl border border-gray-100 p-8 sm:p-10">

                <form method="POST" action="{{ route('restaurant.update') }}" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Restoran</label>
                        <input type="text" name="name" value="{{ old('name', $restaurant->name) }}" required
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 shadow-sm transition text-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status Operasional Toko</label>
                        <select name="is_open"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 shadow-sm transition text-sm">
                            <option value="1" {{ old('is_open', $restaurant->is_open) == 1 ? 'selected' : '' }}>
                                Buka (Menerima Pesanan)</option>
                            <option value="0" {{ old('is_open', $restaurant->is_open) == 0 ? 'selected' : '' }}>
                                Tutup (Sementara Libur)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Toko</label>
                        <textarea name="description" rows="3"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 shadow-sm transition text-sm">{{ old('description', $restaurant->description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Spanduk / Banner Restoran</label>

                        @if ($restaurant->banner)
                            <div class="mb-4">
                                <img src="{{ asset('storage/' . $restaurant->banner) }}" alt="Banner Toko"
                                    class="w-full h-32 object-cover rounded-lg border border-gray-200 shadow-sm">
                                <p class="text-xs text-gray-400 mt-1">Banner aktif saat ini. Unggah berkas baru untuk
                                    mengubahnya.</p>
                            </div>
                        @endif

                        <input type="file" name="banner" accept="image/*"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100 transition">
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="w-full bg-orange-500 text-white font-semibold py-3.5 rounded-lg shadow-sm hover:bg-orange-600 transition text-sm">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
