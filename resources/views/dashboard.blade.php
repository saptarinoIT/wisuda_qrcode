<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if (auth()->user()->level == 'admin' or auth()->user()->level == 'petugas')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row gap-4">
                    <x-dashboard-card src="{{ asset('img/day62-office-bag.svg') }}">
                        <x-slot:title>Total Mahasiswa {{ date('Y') }}</x-slot>
                            {{ $totalWisuda->count() }}
                    </x-dashboard-card>
                    <x-dashboard-card src="{{ asset('img/day63-school-bag.svg') }}">
                        <x-slot:title>Mahasiswa Hadir</x-slot>
                            {{ $wisudaHadir->count() }}
                    </x-dashboard-card>
                    <x-dashboard-card src="{{ asset('img/day61-travel-bag.svg') }}">
                        <x-slot:title>Mahasiswa Tidak Hadir</x-slot>
                            {{ $wisudaTdkHadir->count() }}
                    </x-dashboard-card>
                </div>
            </div>
        </div>
    @endif

    @if (auth()->user()->level == 'mahasiswa')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row">
                    <div
                        class="flex w-full overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 items-center justify-center h-full">
                        <div class="1/5">
                            <img src="{{ asset('img/day63-school-bag.svg') }}" class="object-fill h-full w-48 bg-cover">
                        </div>

                        <div class="w-9/12 sm:w-11/12 px-4">
                            <h2 class="md:text-base text-sm font-bold text-gray-800 dark:text-white pt-2 ">
                                Total Mahasiswa Wisuda
                            </h2>
                            <h1 class="md:text-2xl text-lg mt-2 md:mt-6 font-bold text-gray-800 dark:text-white">
                                {{ $totalWisuda->count() }}
                            </h1>

                            <p class="text-xs md:text-sm text-gray-600 dark:text-gray-400">Mahasiswa</p>
                            <p class="text-right mt-10 sm:mt-4 text-xs text-red-400 dark:text-red-400">*
                                Data
                                Sewaktu -
                                Waktu
                                Dapat
                                Berubah.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endif
</x-app-layout>
