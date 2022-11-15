<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Data User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('wisuda.update', $wisuda->nim) }}">
                    @csrf
                    @method('patch')
                    <div class="grid grid-cols-1 gap-6 mt-4">
                        <!-- NIM Mahasiswa -->
                        <div>
                            <x-input-label for="nim" :value="__('NIM Mahasiswa')" />
                            <x-text-input id="nim" class="block mt-1 w-full bg-gray-200" type="text"
                                name="nim" value="{{ $wisuda->nim }}" required autofocus readonly />
                            <x-input-error :messages="$errors->get('nim')" class="mt-2" />
                        </div>

                        <!-- Nama Mahasiswa -->
                        <div>
                            <x-input-label for="nama_lengkap" :value="__('Nama Mahasiswa')" />
                            <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text" name="nama_lengkap"
                                value=" {{ $wisuda->nama_lengkap }} " required autofocus />
                            <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
                        </div>

                        <!-- Tempat Tanggal Lahir -->
                        <div>
                            <x-input-label for="ttl" :value="__('Tempat Tanggal Lahir')" />
                            <x-text-input id="ttl" class="block mt-1 w-full" type="text" name="ttl"
                                value="{{ $wisuda->ttl }}" required autofocus />
                            <x-input-error :messages="$errors->get('ttl')" class="mt-2" />
                        </div>

                        <!-- Judul Tugas Akhir -->
                        <div>
                            <x-input-label for="judul_ta" :value="__('Judul Tugas Akhir')" />
                            <textarea name="judul_ta" id="judul_ta"
                                class="px-4 py-2 block mt-1 w-full border rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                cols="1" rows="3" required>{{ $wisuda->judul_ta }}</textarea>
                            <x-input-error :messages="$errors->get('judul_ta')" class="mt-2" />
                        </div>

                        <!-- Indeks Prestasi Kumulatif (IPK) -->
                        <div>
                            <x-input-label for="ipk" :value="__('Indeks Prestasi Kumulatif (IPK)')" />
                            <x-text-input id="ipk" class="block mt-1 w-full" type="text" name="ipk"
                                value="{{ $wisuda->ipk }}" required autofocus />
                            <x-input-error :messages="$errors->get('ipk')" class="mt-2" />
                        </div>

                        <!-- Jurusan -->
                        <div>
                            <x-input-label for="jurusan" :value="__('Jurusan')" />
                            <x-text-select id="jurusan" class="block mt-1 w-full" name="jurusan" required>
                                <option value="teknik informatika"
                                    {{ $wisuda->jurusan == 'teknik informatika' ? 'selected' : '' }}>Teknik Informatika
                                </option>
                                <option value="teknik elektro"
                                    {{ $wisuda->jurusan == 'teknik elektro' ? 'selected' : '' }}>
                                    Teknik Elektro
                                </option>
                            </x-text-select>
                            <x-input-error :messages="$errors->get('jurusan')" class="mt-2" />
                        </div>

                        <!-- Kehadiran -->
                        <div>
                            <x-input-label for="kehadiran" :value="__('Kehadiran Mahasiswa')" />
                            <x-text-select id="kehadiran" class="block mt-1 w-full" name="kehadiran" required>
                                <option value="ya" {{ $wisuda->kehadiran == 'ya' ? 'selected' : '' }}>Hadir
                                </option>
                                <option value="tidak" {{ $wisuda->kehadiran == 'tidak' ? 'selected' : '' }}>
                                    Tidak Hadir
                                </option>
                            </x-text-select>
                            <x-input-error :messages="$errors->get('kehadiran')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="orangtua" :value="__('Kehadiran Orang Tua')" />
                            <x-text-select id="orangtua" class="block mt-1 w-full" name="orangtua" required>
                                <option value="ya" {{ $wisuda->orangtua == 'ya' ? 'selected' : '' }}>Hadir
                                </option>
                                <option value="tidak" {{ $wisuda->orangtua == 'tidak' ? 'selected' : '' }}>
                                    Tidak Hadir
                                </option>
                            </x-text-select>
                            <x-input-error :messages="$errors->get('orangtua')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="pendamping" :value="__('Kehadiran Pendamping')" />
                            <x-text-select id="pendamping" class="block mt-1 w-full" name="pendamping" required>
                                <option value="ya" {{ $wisuda->pendamping == 'ya' ? 'selected' : '' }}>Hadir
                                </option>
                                <option value="tidak" {{ $wisuda->pendamping == 'tidak' ? 'selected' : '' }}>
                                    Tidak Hadir
                                </option>
                            </x-text-select>
                            <x-input-error :messages="$errors->get('pendamping')" class="mt-2" />
                        </div>

                    </div>

                    <div class="flex justify-end mt-6">
                        <x-btn-save />
                    </div>
                </form>
            </div>
        </section>
    </div>
</x-app-layout>
