<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Wisudawan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('wisuda.store') }}">
                    @csrf
                    <div class="grid grid-cols-1 gap-6 mt-4">
                        <!-- NIM Mahasiswa -->
                        <div>
                            <x-input-label for="nim" :value="__('NIM Mahasiswa')" />
                            <x-text-input id="nim" class="block mt-1 w-full" type="text" name="nim"
                                :value="old('nim')" required autofocus />
                            <x-input-error :messages="$errors->get('nim')" class="mt-2" />
                        </div>

                        <!-- Nama Mahasiswa -->
                        <div>
                            <x-input-label for="nama_lengkap" :value="__('Nama Mahasiswa')" />
                            <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text" name="nama_lengkap"
                                :value="old('nama_lengkap')" required autofocus />
                            <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
                        </div>

                        <!-- Tempat Tanggal Lahir -->
                        <div>
                            <x-input-label for="ttl" :value="__('Tempat Tanggal Lahir')" />
                            <x-text-input id="ttl" class="block mt-1 w-full" type="text" name="ttl"
                                :value="old('ttl')" required autofocus />
                            <x-input-error :messages="$errors->get('ttl')" class="mt-2" />
                        </div>

                        <!-- Jenis Kelamin -->
                        <div>
                            <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                            <x-text-select id="jenis_kelamin" class="block mt-1 w-full" name="jenis_kelamin" required>
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </x-text-select>
                            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                        </div>

                        <!-- Judul Tugas Akhir -->
                        <div>
                            <x-input-label for="judul_ta" :value="__('Judul Tugas Akhir')" />
                            <textarea name="judul_ta" id="judul_ta"
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                cols="1" rows="3" required></textarea>
                            <x-input-error :messages="$errors->get('judul_ta')" class="mt-2" />
                        </div>

                        <!-- Indeks Prestasi Kumulatif (IPK) -->
                        <div>
                            <x-input-label for="ipk" :value="__('Indeks Prestasi Kumulatif (IPK)')" />
                            <x-text-input id="ipk" class="block mt-1 w-full" type="text" name="ipk"
                                :value="old('ipk')" required autofocus />
                            <x-input-error :messages="$errors->get('ipk')" class="mt-2" />
                        </div>

                        <!-- Jurusan -->
                        <div>
                            <x-input-label for="jurusan" :value="__('Jurusan')" />
                            <x-text-select id="jurusan" class="block mt-1 w-full" name="jurusan" required>
                                <option value="teknik informatika">Teknik Informatika</option>
                                <option value="teknik elektro">Teknik Elektro</option>
                            </x-text-select>
                            <x-input-error :messages="$errors->get('jurusan')" class="mt-2" />
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
