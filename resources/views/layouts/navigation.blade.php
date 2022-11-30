<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('img/logo-crop.png') }}" class="w-28">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Home') }}
                    </x-nav-link>
                </div>

                @if (Auth::user()->level == 'admin' or Auth::user()->level == 'petugas')
                    <div @click.away="open = false" class="relative hidden space-x-8 sm:-my-px sm:ml-5 sm:flex"
                        x-data="{ open: false }">
                        <button @click="open = !open"
                            class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5
                    text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700
                    focus:border-gray-300 transition duration-150 ease-in-out">
                            <span>Data</span>
                            <svg fill="currentColor" viewBox="0 0 20 20"
                                :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 w-full mt-16 origin-top-right rounded-md shadow-lg md:w-48 z-50">
                            <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800 z-50">
                                @if (Auth::user()->level == 'admin')
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                        href="{{ route('users.index') }}">Users Login</a>
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                        href="{{ route('pendaftaran.index') }}">Pendaftaran</a>
                                @endif
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    href="{{ route('wisuda.index') }}">Wisudawan/ti</a>
                                @if (Auth::user()->level == 'admin')
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                        href="{{ route('wisuda.semua') }}">Semua Wisuda</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex">
                        <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index', 'users.create', 'users.edit')">
                            {{ __('User') }}
                        </x-nav-link>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex">
                        <x-nav-link :href="route('pendaftaran.index')" :active="request()->routeIs(
                            'pendaftaran.index',
                            'pendaftaran.create',
                            'pendaftaran.edit',
                            'pendaftaran.show',
                        )">
                            {{ __('Pendaftaran') }}
                        </x-nav-link>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex">
                        <x-nav-link :href="route('wisuda.index')" :active="request()->routeIs('wisuda.index', 'wisuda.create', 'wisuda.edit', 'wisuda.show')">
                            {{ __('Wisuda') }}
                        </x-nav-link>
                    </div> --}}

                    <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex">
                        <x-nav-link :href="route('scan.index')" :active="request()->routeIs('scan.index')">
                            {{ __('Scan') }}
                        </x-nav-link>
                    </div>
                @endif

                @if (auth()->user()->level == 'mahasiswa')
                    <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex">
                        <x-nav-link :href="route('wisuda.index')" :active="request()->routeIs('wisuda.index', 'wisuda.show')">
                            {{ __('Data Wisuda') }}
                        </x-nav-link>
                    </div>

                    {{-- @if ($wisuda->status == 'diterima')
                        <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex">
                            <x-nav-link :href="route('undangan.index')" :active="request()->routeIs('undangan.index')">
                                {{ __('Cetak Undangan') }}
                            </x-nav-link>
                        </div>
                    @endif --}}
                @endif
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ ucwords(Auth::user()->name) }}</div>

                            <div class="ml-1">
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
                        @if (auth()->user()->level == 'mahasiswa')
                            <x-dropdown-link class="text-gray-500 hover:text-gray-700 text-xs" :href="route('pendaftaran.edit', $wisuda->nim)">
                                {{ __('Data Wisuda') }}
                            </x-dropdown-link>
                        @endif
                        {{-- <x-dropdown-link class="text-gray-500 hover:text-gray-700 text-xs" :href="route('logout')">
                            {{ __('Profil') }}
                        </x-dropdown-link> --}}
                        <hr />
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link class="text-red-500 hover:text-red-700 text-xs" :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Home') }}
            </x-responsive-nav-link>
        </div>
        @if (Auth::user()->level == 'admin')
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.index', 'users.create', 'users.edit')">
                    {{ __('Data Users Login') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('pendaftaran.index')" :active="request()->routeIs('pendaftaran.index', 'pendaftaran.create', 'pendaftaran.edit')">
                    {{ __('Data Pendaftaran') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('scan.index')" :active="request()->routeIs('scan.index')">
                    {{ __('Data Scan') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('wisuda.index')" :active="request()->routeIs('wisuda.index', 'wisuda.create', 'wisuda.show', 'wisuda.edit')">
                    {{ __('Data Wisuda') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('wisuda.semua')" :active="request()->routeIs('wisuda.semua', 'wisuda.show')">
                    {{ __('Data Wisuda Semua') }}
                </x-responsive-nav-link>
            </div>
        @endif

        @if (auth()->user()->level == 'petugas')
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('scan.index')" :active="request()->routeIs('scan.index')">
                    {{ __('Data Scan') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('wisuda.index')" :active="request()->routeIs('wisuda.index', 'wisuda.create', 'wisuda.show', 'wisuda.edit')">
                    {{ __('Data Wisuda') }}
                </x-responsive-nav-link>
            </div>
        @endif

        @if (auth()->user()->level == 'mahasiswa')
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('wisuda.index')" :active="request()->routeIs('wisuda.index', 'wisuda.create', 'wisuda.show', 'wisuda.edit')">
                    {{ __('Data Wisuda') }}
                </x-responsive-nav-link>
            </div>
        @endif

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ ucwords(Auth::user()->name) }}</div>
                <div class="font-medium text-sm text-gray-500">{{ ucwords(Auth::user()->email) }}</div>
            </div>

            <div class="mt-3 space-y-1">
                @if (auth()->user()->level == 'mahasiswa')
                    <x-responsive-nav-link class="text-gray-500 hover:text-gray-700 text-xs" :href="route('pendaftaran.edit', $wisuda->nim)">
                        {{ __('Data Wisuda') }}
                    </x-responsive-nav-link>
                @endif
                {{-- <x-responsive-nav-link class="text-gray-500 hover:text-gray-700 text-xs" :href="route('logout')">
                    {{ __('Profil') }}
                </x-responsive-nav-link> --}}
                <hr />

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();"
                        class="text-red-600 hover:text-red-800">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
