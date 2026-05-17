<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-900 leading-tight">
                {{ __('Tambah Menu Baru') }}
            </h2>
            <a href="{{ route('menu.index') }}"
                class="text-sm font-semibold text-gray-600 hover:text-orange-500 transition">
                &larr; Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-xl border border-gray-100 p-8 sm:p-10">
                <div class="mb-8">
                    <p class="text-gray-500 text-sm">Masukkan detail makanan atau minuman yang ingin dijual.</p>
                </div>

                <form method="POST" action="{{ route('menu.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Menu</label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 shadow-sm transition text-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori Menu</label>
                        <input type="text" name="category"
                            placeholder="Contoh: Makanan Utama, Minuman Segar, Cemilan"
                            value="{{ old('category', 'Makanan Utama') }}" required
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 shadow-sm transition text-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Harga Menu</label>
                        <div class="relative rounded-lg shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                <span class="text-gray-400 font-semibold text-sm select-none">Rp</span>
                            </div>

                            <input type="text" id="price_display" required placeholder="0"
                                value="{{ old('price') ? number_format(old('price'), 0, ',', '.') : '' }}"
                                class="block w-full pl-11 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 transition text-sm">

                            <input type="hidden" name="price" id="price_hidden" value="{{ old('price') }}">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Singkat</label>
                        <textarea name="description" rows="3"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 shadow-sm transition text-sm">{{ old('description') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Menu (Opsional)</label>
                        <input type="file" name="image" accept="image/*"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100 transition">
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="w-full bg-orange-500 text-white font-semibold py-3.5 rounded-lg shadow-sm hover:bg-orange-600 transition text-sm">
                            Simpan Menu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const priceDisplay = document.getElementById('price_display');
            const priceHidden = document.getElementById('price_hidden');

            function formatRupiah(angka) {
                let number_string = angka.toString().replace(/[^0-9]/g, ''),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    let separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                return rupiah;
            }

            priceDisplay.addEventListener('input', function() {
                let cleanValue = this.value.replace(/[^0-9]/g, '');
                priceHidden.value = cleanValue;
                this.value = formatRupiah(cleanValue);
            });
        });
    </script>
</x-app-layout>
