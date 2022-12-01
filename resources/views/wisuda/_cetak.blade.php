<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cetak Undangan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($wisuda->status == 'diterima')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <a href="{{ route('wisuda.print', $nim) }}" target="_blank" rel="noopener noreferrer">
                        <p class="px-6 py-4 bg-blue-600 font-bold text-white">Cetak Undangan</p>
                    </a>
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <p class="px-6 py-4 bg-red-500 font-bold text-white">Maaf! Data belum diverifikasi oleh admin.
                        Silahkan hubungi admin.</p>
                </div>
            @endif
        </section>
    </div>
</x-app-layout>
