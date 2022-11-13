<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rubah Data Wisuda Mahasiswa ' . $wisuda->nama) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('pendaftaran.update', $wisuda->nim) }}">
                    @csrf
                    @method('patch')
                    <div class="grid grid-cols-1 gap-4 mt-8 md:grid-cols-2">
                        <!-- NIM Mahasiswa -->
                        <div>
                            <x-input-label for="nim" :value="__('NIM Mahasiswa')" />
                            <x-text-input id="nim" class="block mt-1 w-full bg-gray-100" type="text"
                                name="nim" value="{{ $wisuda->nim }}" required autofocus readonly />
                            <x-input-error :messages="$errors->get('nim')" class="mt-2" />
                        </div>

                        <!-- Nama Mahasiswa -->
                        <div>
                            <x-input-label for="nama_lengkap" :value="__('Nama Mahasiswa')" />
                            <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text" name="nama_lengkap"
                                value="{{ $wisuda->nama_lengkap }}" required autofocus placeholder="John Doe" />
                            <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
                        </div>

                        <!-- Email Mahasiswa -->
                        <div>
                            <x-input-label for="email" :value="__('Email Mahasiswa')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                value="{{ $wisuda->user->email }}" required autofocus
                                placeholder="john.doe@example.com" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Tempat Tanggal Lahir -->
                        <div>
                            <x-input-label for="ttl" :value="__('Tempat Tanggal Lahir')" />
                            <x-text-input id="ttl" class="block mt-1 w-full" type="text" name="ttl"
                                value="{{ $wisuda->ttl }}" required autofocus placeholder="Bontang, 28 Oktober 1999" />
                            <x-input-error :messages="$errors->get('ttl')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Judul Tugas Akhir -->
                    <div class="mt-4">
                        <x-input-label for="judul_ta" :value="__('Judul Tugas Akhir')" />
                        <textarea name="judul_ta" id="judul_ta"
                            class="text-sm block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                            cols="1" rows="2" required
                            placeholder="Penerapan Metode Agile Pada Sistem Informasi Manajemen Tugas AKhir STITEK Bontang">{{ $wisuda->judul_ta }}</textarea>
                        <x-input-error :messages="$errors->get('judul_ta')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-1 gap-4 mt-8 md:grid-cols-2">
                        <!-- Indeks Prestasi Kumulatif (IPK) -->
                        <div>
                            <x-input-label for="ipk" :value="__('Indeks Prestasi Kumulatif (IPK)')" />
                            <x-text-input id="ipk" class="block mt-1 w-full" type="text" name="ipk"
                                value="{{ $wisuda->ipk }}" required autofocus placeholder="4.00" />
                            <x-input-error :messages="$errors->get('ipk')" class="mt-2" />
                        </div>

                        <!-- Jurusan -->
                        <div>
                            <x-input-label for="jurusan" :value="__('Jurusan')" />
                            <x-text-select id="jurusan" class="block mt-1 w-full text-sm" name="jurusan" required>
                                <option value="teknik informatika"
                                    {{ $wisuda->jurusan == 'teknik informatika' ? 'selected' : '' }}>Teknik
                                    Informatika</option>
                                <option value="teknik elektro"
                                    {{ $wisuda->jurusan == 'teknik elektro' ? 'selected' : '' }}>Teknik Elektro</option>
                            </x-text-select>
                            <x-input-error :messages="$errors->get('jurusan')" class="mt-2" />
                        </div>
                    </div>

                    <p class="mt-4 text-xs font-bold">
                        STATUS PENDAFTARAN : <span
                            class="{{ $wisuda->status == 'diproses' ? 'text-red-600' : 'text-green-500' }}">{{ strtoupper($wisuda->status) }}</span>
                    </p>

                    <div class="flex justify-end">
                        <x-primary-button>
                            {{ __('Simpan Data') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</x-app-layout>
