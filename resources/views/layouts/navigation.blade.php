<nav x-data="{ open: false }" class="w-full bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center h-full">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ url('/') }}">
                        <span class="text-2xl text-orange-500 tracking-tight">PesanBayar</span>
                    </a>
                </div>

                <div class="hidden space-x-4 sm:ms-10 sm:flex h-full items-center">
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="text-gray-600 hover:text-orange-500 transition px-3 py-2 {{ request()->routeIs('dashboard') ? 'text-orange-500' : '' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('menu.index') }}"
                            class="text-gray-600 hover:text-orange-500 transition px-3 py-2 {{ request()->routeIs('menu.*') ? 'text-orange-500' : '' }}">
                            Kelola Menu
                        </a>
                    @endauth
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 text-sm text-gray-600 hover:text-orange-500 transition">
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
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-orange-500 transition px-3 py-2">Log
                        in</a>
                    <a href="{{ route('register') }}"
                        class="bg-orange-500 text-white px-5 py-2 rounded-lg hover:bg-orange-600 transition ml-2">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
