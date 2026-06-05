@php
    // Hitung total quantity item yang ada di session cart secara global
    $cart = session()->get('cart', []);
    $totalCartItems = 0;
    foreach ($cart as $item) {
        $totalCartItems += $item['quantity'];
    }
@endphp

<nav x-data="{ open: false }" class="w-full bg-white border-b border-gray-100 sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <div class="flex items-center h-full">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ url('/') }}">
                        <span class="font-semibold text-2xl text-orange-500 tracking-tight">PesanBayar</span>
                    </a>
                </div>

                <div class="hidden space-x-4 sm:ms-10 sm:flex h-full items-center">
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="font-semibold text-gray-600 hover:text-orange-500 transition px-3 py-2 {{ request()->routeIs('dashboard') ? 'text-orange-500' : '' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('menu.index') }}"
                            class="font-semibold text-gray-600 hover:text-orange-500 transition px-3 py-2 {{ request()->routeIs('menu.*') ? 'text-orange-500' : '' }}">
                            Kelola Menu
                        </a>
                        <a href="{{ route('order.history') }}"
                            class="font-semibold text-gray-600 hover:text-orange-500 transition px-3 py-2 {{ request()->routeIs('order.history') ? 'text-orange-500' : '' }}">
                            Riwayat Pesanan
                        </a>
                    @endauth
                </div>
            </div>

            <div class="flex items-center space-x-3 sm:space-x-6">

                <a href="{{ route('cart.index') }}"
                    class="relative p-2 text-gray-500 hover:text-orange-500 transition rounded-full hover:bg-gray-50">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>

                    @if ($totalCartItems > 0)
                        <span
                            class="absolute top-1 right-1 inline-flex items-center justify-center px-2 py-0.5 text-xs font-extrabold leading-none text-white transform translate-x-1/3 -translate-y-1/3 bg-orange-500 rounded-full border-2 border-white shadow-sm">
                            {{ $totalCartItems }}
                        </span>
                    @endif
                </a>

                <div class="hidden sm:flex sm:items-center">
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 text-sm font-semibold text-gray-600 hover:text-orange-500 transition">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();">Log
                                        Out</x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-700 hover:text-orange-500 transition px-3 py-2 text-sm">Log
                            in</a>
                        <a href="{{ route('register') }}"
                            class="bg-orange-500 text-white px-4 py-2 rounded-lg font-semibold text-sm hover:bg-orange-600 shadow-sm transition ml-2">Register</a>
                    @endauth
                </div>

                @auth
                    <div class="flex items-center sm:hidden">
                        <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-lg text-gray-400 hover:text-gray-500 hover:bg-gray-50 transition">
                            <svg class="h-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden border-b border-gray-100 bg-white">
        @auth
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    Dashboard
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('menu.index')" :active="request()->routeIs('menu.*')">
                    Kelola Menu
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('order.history')" :active="request()->routeIs('order.history')">
                    Riwayat Pesanan
                </x-responsive-nav-link>
            </div>
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">Profile</x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</nav>
