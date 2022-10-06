<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div> --}}
            {{-- <div class="block lg:flex lg:gap-4 "> --}}
            <div class="flex flex-col lg:flex-row gap-4">
                <x-dashboard-card src="{{ asset('img/day62-office-bag.svg') }}">
                    <x-slot:title>Total Mahasiswa</x-slot>
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
</x-app-layout>
