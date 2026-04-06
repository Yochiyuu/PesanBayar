@extends('layouts.app')

@section('content')
    <div class="min-h-[80vh] flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-gray-50">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Daftarkan Resto Anda
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Mulai terima pesanan digital dalam 5 menit.
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow-xl sm:rounded-2xl sm:px-10 border border-gray-100">
                <form class="space-y-6" action="{{ route('restaurant.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Restoran</label>
                        <div class="mt-1">
                            <input id="name" name="name" type="text" required
                                class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm transition">
                        </div>
                    </div>

                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700">URL Restoran (Slug)</label>
                        <div class="mt-1 flex rounded-xl shadow-sm">
                            <span
                                class="inline-flex items-center px-3 rounded-l-xl border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                pesanbayar.com/resto/
                            </span>
                            <input type="text" name="slug" id="slug"
                                class="flex-1 min-w-0 block w-full px-3 py-3 border border-gray-300 rounded-none rounded-r-xl focus:ring-orange-500 focus:border-orange-500 sm:text-sm transition">
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition">
                            Buat Restoran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
