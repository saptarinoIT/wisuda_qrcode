<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('assets/js/init-alpine.js') }}"></script>
</head>

<body>
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
                        <img src="{{ asset('img/logo-crop.png') }}" class="w-34 pb-8">
                        <h1
                            class="mb-4 text-xl font-semibold text-gray-700
                            dark:text-gray-200">
                            Daftar Wisuda {{ date('Y') }}
                        </h1>

                        <form method="POST" action="{{ route('pendaftaran.store') }}">
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
                                    <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text"
                                        name="nama_lengkap" :value="old('nama_lengkap')" required autofocus />
                                    <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
                                </div>

                                <!-- Email Mahasiswa -->
                                <div>
                                    <x-input-label for="email" :value="__('Email Mahasiswa')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        :value="old('email')" required autofocus />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Tempat Tanggal Lahir -->
                                <div>
                                    <x-input-label for="ttl" :value="__('Tempat Tanggal Lahir')" />
                                    <x-text-input id="ttl" class="block mt-1 w-full" type="text" name="ttl"
                                        :value="old('ttl')" required autofocus style="margin-bottom: 6px" />
                                    <span class="text-red-600" style="font-size: 11px">* Example: Bontang, 28 Oktober
                                        1999</span>
                                    <x-input-error :messages="$errors->get('ttl')" class="mt-2" />
                                </div>

                                <!-- Judul Tugas Akhir -->
                                <div>
                                    <x-input-label for="judul_ta" :value="__('Judul Tugas Akhir')" />
                                    <textarea name="judul_ta" id="judul_ta"
                                        class="px-4 py-2 block mt-1 w-full border rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        cols="1" rows="3" required></textarea>
                                    <x-input-error :messages="$errors->get('judul_ta')" class="mt-2" />
                                </div>

                                <!-- Indeks Prestasi Kumulatif (IPK) -->
                                <div>
                                    <x-input-label for="ipk" :value="__('Indeks Prestasi Kumulatif (IPK)')" />
                                    <x-text-input id="ipk" class="block mt-1 w-full" type="text" name="ipk"
                                        :value="old('ipk')" required autofocus style="margin-bottom: 6px" />
                                    <span class="text-red-600" style="font-size: 11px">* Example: 3.50</span>
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
                                <x-primary-button>
                                    {{ __('Register') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
