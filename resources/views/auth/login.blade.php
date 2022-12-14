<x-guest-layout>

    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
                        src="{{ asset('img/bg-login.jpg') }}" alt="Office" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                        src="{{ asset('img/bg-login.jpg') }}" alt="Office" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <a href="{{ route('login') }}">
                            <img src="{{ asset('img/logo-crop.png') }}" class="w-40 pb-6">
                        </a>
                        <h1
                            class="mb-4 text-xl font-semibold text-gray-700
                            dark:text-gray-200">
                            Login
                        </h1>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Email Address -->
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autofocus />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Password')" />
                                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="current-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="flex flex-col items-center justify-end">
                                <x-primary-button>
                                    {{ __('Log in') }}
                                </x-primary-button>

                                <span class="text-xs font-medium pt-5 text-gray-500">Daftar Wisuda STITEK Bontang
                                    {{ date('Y') }}
                                    <a class="font-bold duration-300 text-gray-600 hover:text-gray-900 hover:underline underline-offset-2"
                                        href="{{ route('pendaftaran.create') }}">
                                        {{ __('Klik Disini') }}
                                    </a>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="logo-auth" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>


    </x-auth-card> --}}
</x-guest-layout>
