@extends('layouts.app')

@section('title', 'Daftar Restoran Baru - CerdasResto')

@section('content')
    <div class="max-w-4xl mx-auto">

        <div class="mb-10">
            <a href="#"
                class="text-sm font-medium text-teal-600 hover:text-teal-700 transition-colors flex items-center gap-1.5 mb-3">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Kembali ke Daftar Restoran
            </a>
            <h1 class="text-2xl font-bold text-slate-900">Pendaftaran Restoran Baru</h1>
            <p class="text-slate-600 mt-1">Lengkapi informasi di bawah ini untuk mendaftarkan restoran Anda ke sistem
                CerdasResto.</p>
        </div>

        <form action="{{ route('order.store') }}" method="POST">
            @csrf

            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm flex flex-col gap-8">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Nama Restoran <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg focus:ring-2 focus:ring-teal-100 focus:border-teal-300 outline-none transition-all placeholder:text-slate-400"
                            placeholder="Contoh: RM Padang Sederhana">
                    </div>
                    <div>
                        <label for="category" class="block text-sm font-medium text-slate-700 mb-2">Kategori Kuliner <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="category" id="category" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg focus:ring-2 focus:ring-teal-100 focus:border-teal-300 outline-none transition-all placeholder:text-slate-400"
                            placeholder="Contoh: Masakan Minang, Coffee Shop">
                    </div>
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-slate-700 mb-2">Deskripsi
                            Singkat</label>
                        <textarea name="description" id="description" rows="4"
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg focus:ring-2 focus:ring-teal-100 focus:border-teal-300 outline-none transition-all placeholder:text-slate-400 resize-none"
                            placeholder="Berikan deskripsi singkat tentang restoran Anda (maks. 200 karakter)"></textarea>
                    </div>
                </div>

                <hr class="border-slate-100">

                <div class="grid grid-cols-1 gap-y-6">
                    <div>
                        <label for="address" class="block text-sm font-medium text-slate-700 mb-2">Alamat Lengkap <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="address" id="address" required
                            class="w-full px-4 py-2.5 border border-slate-200 rounded-lg focus:ring-2 focus:ring-teal-100 focus:border-teal-300 outline-none transition-all placeholder:text-slate-400"
                            placeholder="Jl. Merdeka No. 12, Jakarta Pusat">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-slate-700 mb-2">Nomor Telepon
                                Restoran</label>
                            <input type="tel" name="phone" id="phone"
                                class="w-full px-4 py-2.5 border border-slate-200 rounded-lg focus:ring-2 focus:ring-teal-100 focus:border-teal-300 outline-none transition-all placeholder:text-slate-400"
                                placeholder="Contoh: 021-1234567">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email Bisnis</label>
                            <input type="email" name="email" id="email"
                                class="w-full px-4 py-2.5 border border-slate-200 rounded-lg focus:ring-2 focus:ring-teal-100 focus:border-teal-300 outline-none transition-all placeholder:text-slate-400"
                                placeholder="Contoh: kontak@restorananda.com">
                        </div>
                    </div>
                </div>

                <hr class="border-slate-100">

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Logo Restoran</label>
                    <div
                        class="border-2 border-dashed border-slate-200 rounded-xl p-8 text-center flex flex-col items-center justify-center gap-4 bg-slate-50 hover:border-slate-300 transition-colors">
                        <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <p class="text-sm text-slate-600 font-medium">Klik untuk mengunggah atau drag & drop</p>
                        <p class="text-xs text-slate-500">PNG, JPG, JPEG (Maks. 2MB, Rekomendasi 512x512 px)</p>
                        <input type="file" name="logo" id="logo" class="sr-only">
                        <button type="button"
                            class="mt-2 text-sm font-semibold text-teal-600 px-4 py-2 rounded-lg bg-teal-50 hover:bg-teal-100 transition-all">Pilih
                            File</button>
                    </div>
                </div>

                <div class="flex justify-end pt-4 border-t border-slate-100">
                    <button type="submit"
                        class="w-full md:w-auto bg-teal-600 text-white font-bold py-3 px-10 rounded-xl hover:bg-teal-700 hover:-translate-y-1 transition-all shadow-lg shadow-teal-100">
                        Daftar Restoran
                    </button>
                </div>

            </div>
        </form>
    </div>
@endsection
