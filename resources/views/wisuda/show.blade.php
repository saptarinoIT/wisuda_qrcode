<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col items-center justify-center sm:flex-row  sm:justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Data Wisuda') }}
            </h2>
        </div>
    </x-slot>


    <div class="py-12">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg p-8">
                    @if ($wisuda->kehadiran == 'tidak')
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-red-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path
                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-green-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path
                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                        </svg>
                    @endif

                    <h3 class="mt-3 text-lg font-bold text-blue-400">{{ $wisuda->nim }} -
                        {{ strtoupper($wisuda->nama_lengkap) }} </h3>
                    <p class="text-xs text-gray-400">{{ ucwords($wisuda->ttl) }} /
                        {{ ucwords($wisuda->jenis_kelamin) }}
                    </p>

                    <p class="mt-4 mb-1 text-xs text-blue-400 font-bold">JUDUL TUGAS AKHIR</p>
                    <hr />
                    <p class="mt-1 mb-4 text-sm text-gray-500">{{ ucwords($wisuda->judul_ta) }} </p>
                    <p class="text-xs text-gray-400 font-bold"> {{ strtoupper($wisuda->jurusan) }} / <span
                            class="text-blue-400">IPK : </span> {{ $wisuda->ipk }} </p>

                </div>
            </div>
        </section>
    </div>

    <x-slot name="script">
        <script>
            $(document).ready(function() {
                $('#datatables-data').DataTable();
            });
        </script>
    </x-slot>
</x-app-layout>
