<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col items-center justify-center sm:flex-row  sm:justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Data Pendaftaran Wisuda ') . date('Y') }}
            </h2>
        </div>
    </x-slot>


    <div class="py-12">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg p-3">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 rounded-lg"
                        id="datatables-data">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <x-th-table>NIM Mahasiswa</x-th-table>
                                <x-th-table>Nama Mahasiswa</x-th-table>
                                <x-th-table>Aksi</x-th-table>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendaftaran as $pend)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <x-td-table>{{ $pend->nim }}</x-td-table>
                                    <x-td-table>{{ ucwords($pend->nama_lengkap) }}</x-td-table>
                                    <td class="flex gap-1">
                                        <x-btn-detail href="{{ route('pendaftaran.show', $pend->nim) }}" />
                                        <x-btn-edit href="{{ route('pendaftaran.edit', $pend->nim) }}" />
                                        @if ($pend->status == 'diproses')
                                            <a href="{{ route('pendaftaran.validasi', $pend->nim) }}"
                                                class="px-3 py-1 bg-green-500 hover:bg-green-600 text-xs rounded shadow text-white border-none">Verif</a>
                                            <a href="{{ route('pendaftaran.destroy', $pend->nim) }}"
                                                class="px-3 py-1 bg-red-500 hover:bg-red-600 text-xs rounded shadow text-white border-none">Hapus</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <x-slot name="script">
        <script>
            $(document).ready(function() {
                $('#datatables-data').DataTable({
                    order: [
                        [3, 'asc']
                    ],
                });
            });
        </script>
    </x-slot>
</x-app-layout>
