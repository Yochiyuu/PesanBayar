@extends('layouts.app')

@section('title', 'Daftar Restoran Baru')

@section('content')
    <div class="max-w-md mx-auto w-full bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden my-16">
        <div class="bg-indigo-600 p-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-2">Setup Restoran 🏪</h2>
            <p class="text-indigo-100">Satu langkah lagi untuk go digital.</p>
        </div>
        <div class="p-8">
            <form action="{{ route('restaurant.store') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Restoran</label>
                    <input type="text" name="name" required
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all placeholder-slate-400"
                        placeholder="Misal: Kopi Kenangan">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Singkat</label>
                    <textarea name="description" rows="3"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all placeholder-slate-400"
                        placeholder="Ceritakan restoran Anda..."></textarea>
                </div>

                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3.5 px-4 rounded-xl transition-all shadow-md mt-4">
                    Buat Restoran
                </button>
            </form>
        </div>
    </div>
@endsection
