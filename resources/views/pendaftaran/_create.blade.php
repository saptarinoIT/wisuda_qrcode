<x-guest-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="flex justify-center min-h-screen">
            <div class="hidden bg-cover lg:block lg:w-2/5" style="background-image: url('')">
                <img src="{{ asset('img/bg-login.jpg') }}" class="min-h-full object-cover">
            </div>

            <div class="flex items-center w-full max-w-3xl p-8 mx-auto lg:px-12 lg:w-3/5">
                <div class="w-full">
                    <a href="{{ route('login') }}">
                        <img src="{{ asset('img/logo-crop.png') }}" class="w-40 pb-6">
                    </a>
                    <h1 class="text-xl font-bold tracking-wider text-gray-800 capitalize dark:text-white">
                        Pendaftaran Wisuda {{ date('Y') }}
                    </h1>

                    <form method="POST" action="{{ route('pendaftaran.store') }}">
                        @csrf
                        <div class="grid grid-cols-1 gap-4 mt-8 md:grid-cols-2">
                            <!-- NIM Mahasiswa -->
                            <div>
                                <x-input-label for="nim" :value="__('NIM Mahasiswa')" />
                                <x-text-input id="nim" class="block mt-1 w-full" type="text" name="nim"
                                    :value="old('nim')" required autofocus placeholder="{{ date('Y') }}12001" />
                                <x-input-error :messages="$errors->get('nim')" class="mt-2" />
                            </div>

                            <!-- Nama Mahasiswa -->
                            <div>
                                <x-input-label for="nama_lengkap" :value="__('Nama Mahasiswa')" />
                                <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text"
                                    name="nama_lengkap" :value="old('nama_lengkap')" required autofocus placeholder="John Doe" />
                                <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
                            </div>

                            <!-- Email Mahasiswa -->
                            <div>
                                <x-input-label for="email" :value="__('Email Mahasiswa')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autofocus placeholder="john.doe@example.com" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Tempat Tanggal Lahir -->
                            <div>
                                <x-input-label for="ttl" :value="__('Tempat Tanggal Lahir')" />
                                <x-text-input id="ttl" class="block mt-1 w-full" type="text" name="ttl"
                                    :value="old('ttl')" required autofocus placeholder="Bontang, 28 Oktober 1999" />
                                <x-input-error :messages="$errors->get('ttl')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Judul Tugas Akhir -->
                        <div class="mt-4">
                            <x-input-label for="judul_ta" :value="__('Judul Tugas Akhir')" />
                            <textarea name="judul_ta" id="judul_ta"
                                class="text-sm block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                cols="1" rows="2" required
                                placeholder="Penerapan Metode Agile Pada Sistem Informasi Manajemen Tugas AKhir STITEK Bontang"></textarea>
                            <x-input-error :messages="$errors->get('judul_ta')" class="mt-2" />
                        </div>


                        <div class="grid grid-cols-1 gap-4 mt-8 md:grid-cols-2">
                            <!-- Indeks Prestasi Kumulatif (IPK) -->
                            <div>
                                <x-input-label for="ipk" :value="__('Indeks Prestasi Kumulatif (IPK)')" />
                                <x-text-input id="ipk" class="block mt-1 w-full" type="text" name="ipk"
                                    :value="old('ipk')" required autofocus placeholder="4.00" />
                                <x-input-error :messages="$errors->get('ipk')" class="mt-2" />
                            </div>

                            <!-- Jurusan -->
                            <div>
                                <x-input-label for="jurusan" :value="__('Jurusan')" />
                                <x-text-select id="jurusan" class="block mt-1 w-full text-sm" name="jurusan" required>
                                    <option value="teknik informatika">Teknik Informatika</option>
                                    <option value="teknik elektro">Teknik Elektro</option>
                                </x-text-select>
                                <x-input-error :messages="$errors->get('jurusan')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex justify-end mt-4">
                            <x-primary-button>
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
