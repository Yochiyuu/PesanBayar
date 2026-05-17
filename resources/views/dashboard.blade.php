<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div
                    class="p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg font-medium text-sm flex items-center shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            @if (auth()->user()->restaurant)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 p-6 md:p-8">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div>
                            <span class="text-xs font-semibold text-orange-500 uppercase tracking-wider block">Restoran
                                Anda</span>
                            <h3 class="text-2xl font-semibold text-gray-900 mt-1">{{ auth()->user()->restaurant->name }}
                            </h3>
                            @if (auth()->user()->restaurant->description)
                                <p class="text-sm text-gray-500 mt-1 max-w-xl">
                                    {{ auth()->user()->restaurant->description }}</p>
                            @endif
                        </div>
                        <div class="w-full sm:w-auto flex flex-wrap gap-3">
                            <a href="{{ route('restaurant.edit') }}"
                                class="inline-flex items-center justify-center bg-gray-900 text-white px-5 py-2.5 rounded-lg font-semibold text-sm hover:bg-gray-800 shadow-sm transition gap-2">
                                Pengaturan Restoran
                            </a>
                            <a href="{{ route('restaurant.show', auth()->user()->restaurant->slug) }}" target="_blank"
                                class="inline-flex items-center justify-center bg-white border border-gray-300 text-gray-700 px-5 py-2.5 rounded-lg font-semibold text-sm hover:bg-gray-50 shadow-sm transition gap-2">
                                Buka Katalog Menu
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="p-6 md:p-8 text-gray-900 text-base font-medium">
                    Selamat datang kembali, {{ Auth::user()->name }}! 👋
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
