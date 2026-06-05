<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            {{ __('Pengaturan Restoran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition.opacity.duration.500ms
                    class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg font-medium text-sm flex items-center shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('restaurant.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                    <div class="lg:col-span-7 space-y-6">
                        <div class="bg-white shadow-sm sm:rounded-xl border border-gray-100 p-6 md:p-8">
                            <h3
                                class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2 border-b border-gray-100 pb-4">
                                <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Informasi Utama
                            </h3>

                            <div class="space-y-6">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Restoran <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" name="name" value="{{ old('name', $restaurant->name) }}"
                                        required
                                        class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-orange-500 focus:border-orange-500 shadow-sm transition text-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Toko</label>
                                    <textarea name="description" rows="5"
                                        class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-orange-500 focus:border-orange-500 shadow-sm transition text-sm"
                                        placeholder="Ceritakan sedikit tentang restoran Anda...">{{ old('description', $restaurant->description) }}</textarea>
                                    <p class="text-xs text-gray-500 mt-2">Deskripsi ini akan tampil di halaman utama
                                        katalog menu Anda.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-5 space-y-6">

                        <div class="bg-white shadow-sm sm:rounded-xl border border-gray-100 p-6 md:p-8">
                            <h3
                                class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2 border-b border-gray-100 pb-4">
                                <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Operasional Toko
                            </h3>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Status Saat Ini</label>
                                <select name="is_open"
                                    class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-orange-500 focus:border-orange-500 shadow-sm transition text-sm font-semibold text-gray-700">
                                    <option value="1"
                                        {{ old('is_open', $restaurant->is_open) == 1 ? 'selected' : '' }}>🟢 Buka
                                        (Menerima Pesanan)</option>
                                    <option value="0"
                                        {{ old('is_open', $restaurant->is_open) == 0 ? 'selected' : '' }}>🔴 Tutup
                                        (Sementara Libur)</option>
                                </select>
                            </div>
                        </div>

                        <div class="bg-white shadow-sm sm:rounded-xl border border-gray-100 p-6 md:p-8">
                            <h3
                                class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2 border-b border-gray-100 pb-4">
                                <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                Visual Restoran
                            </h3>

                            <div x-data="{ photoName: null, photoPreview: null }">
                                <label class="block text-sm font-bold text-gray-700 mb-2">Spanduk / Banner
                                    (Opsional)</label>

                                <div class="mb-4">
                                    @if ($restaurant->banner)
                                        <div x-show="!photoPreview"
                                            class="rounded-lg overflow-hidden border border-gray-200 shadow-sm">
                                            <img src="{{ asset('storage/' . $restaurant->banner) }}" alt="Banner Toko"
                                                class="w-full h-40 object-cover">
                                        </div>
                                    @else
                                        <div x-show="!photoPreview"
                                            class="w-full h-40 bg-gray-50 border-2 border-dashed border-gray-200 rounded-lg flex flex-col items-center justify-center text-gray-400">
                                            <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                            <span class="text-xs font-semibold">Belum ada spanduk</span>
                                        </div>
                                    @endif

                                    <div x-show="photoPreview" style="display: none;"
                                        class="rounded-lg overflow-hidden border border-orange-200 shadow-sm">
                                        <span class="block w-full h-40 bg-cover bg-no-repeat bg-center"
                                            x-bind:style="'background-image: url(\'' + photoPreview + '\');'"></span>
                                    </div>
                                </div>

                                <input type="file" name="banner" accept="image/*" class="hidden" x-ref="photo"
                                    x-on:change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                    ">

                                <button type="button" x-on:click.prevent="$refs.photo.click()"
                                    class="w-full bg-white border border-gray-300 text-gray-700 font-semibold py-2.5 rounded-lg shadow-sm hover:bg-gray-50 transition text-sm flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                    </svg>
                                    Pilih Gambar Baru
                                </button>
                            </div>
                        </div>

                        <div class="sticky top-24 pt-2">
                            <button type="submit"
                                class="w-full bg-orange-500 text-white font-bold py-4 rounded-xl shadow-md hover:bg-orange-600 hover:shadow-lg transition-all flex justify-center items-center gap-2">
                                Simpan Perubahan
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </button>
                        </div>

                    </div>

                </div>
            </form>

        </div>
    </div>
</x-app-layout>
