<x-guest-layout>
    <!-- usertype Toggle -->
    <x-input-label for="name_dosen" :value="__('Register Sebagai')" />
    <div class="mt-4 flex items-center">
        <input type="checkbox" id="usertype_toggle" name="usertype_toggle" class="hidden" />
        <label for="usertype_toggle" class="flex items-center cursor-pointer">
            <span id="label_dosen" class="mr-3 text-gray-700">Dosen</span>
            <div class="relative">
                <div class="w-20 h-8 bg-gray-200 rounded-full"></div>
                <div class="absolute top-1 left-1 w-6 h-6 bg-white rounded-full transition-transform duration-300"></div>
            </div>
            <span id="label_pt" class="ml-3 text-gray-700">PT</span>
        </label>
    </div>

    <!-- Form for Dosen -->
    <form method="POST" action="{{ route('register') }}" id="form_dosen" class="mt-4" enctype="multipart/form-data">
        @csrf
        <!-- Name -->
        <div class="grid grid-rows-3 grid-flow-col gap-4">
            <div class="row-span-3 ...">
                <div>
                    <x-input-label for="namadosen" :value="__('Nama Dosen')" />
                    <x-text-input id="namadosen" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <!-- namapt -->
                <div class="mt-4 hidden">
                    <x-input-label for="usertype" :value="__('PT Field')" />
                    <x-text-input id="usertype" class="block mt-1 w-full" type="text" name="usertype" value="user" required autocomplete="usertype" />
                    <x-input-error :messages="$errors->get('usertype')" class="mt-2" />
                </div>
                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email_pt" :value="__('Email')" />
                    <x-text-input id="email_pt" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- nidn -->
                <div class="mt-4">
                    <x-input-label for="nidn" :value="__('NIDN')" />
                    <x-text-input id="nidn" class="block mt-1 w-full" type="number" name="nidn" :value="old('nidn')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('nidn')" class="mt-2" />
                </div>
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password_pt" :value="__('Password')" />
                    <x-text-input id="password_pt" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation_pt" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation_pt" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>
            <div class="col-span-3 row-span-3 ...">
                <!-- namapt -->
                <div class="">
                    <x-input-label for="id_pt" :value="__('Asal Perguruan Tinggi')" />
                    <select id="id_pt" name="id_pt" class="block mt-1 w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" required autocomplete="username">
                        <!-- Add options here -->
                        <option value="" disabled selected>Pilih Asal Universitas</option>
                        @foreach ($ptData as $pt)
                            <option value="{{ $pt['id'] }}">{{ $pt['namapt'] }}</option>
                        @endforeach
                        <!-- Add more options as needed -->
                    </select>
                    <x-input-error :messages="$errors->get('id_pt')" class="mt-2" />
                </div>


                <!-- notelepon -->
                <div class="mt-4">
                    <x-input-label for="telp" :value="__('No Telepon')" />
                    <x-text-input id="telp" class="block mt-1 w-full" type="text" name="telp" :value="old('telp')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('telp')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="dokumen1" :value="__('Berkas 1 Bukti Pembayaran')" />
                    <label for="dokumen1" class="sr-only">Choose file</label>
                    <input type="file" name="dokumen1"  accept=".jpg, .jpeg, .png, .pdf" id="dokumen1" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                        file:bg-gray-50 file:border-0
                        file:me-4
                        file:py-3 file:px-4
                    ">
                    <x-input-error :messages="$errors->get('dokumen1')" class="mt-2" />
                </div>
                
                <!-- berkas2 -->
                <div class="mt-4">
                    <x-input-label for="dokumen2" :value="__('Berkas 2 Surat Keterangan')" />
                    <input type="file" name="dokumen2"  accept=".jpg, .jpeg, .png, .pdf" id="dokumen2" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                        file:bg-gray-50 file:border-0
                        file:me-4
                        file:py-3 file:px-4
                    ">
                    <x-input-error :messages="$errors->get('dokumen2')" class="mt-2" />
                </div>
                
            </div>

            <div class="col-span-3 row-span-3 ...">
                <!-- berkas1 -->
               
            </div>
        </div>
        <div class="flex items-center justify-end mt-4 ">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
    </form>

    <!-- Form for PT -->
    <form method="POST" action="{{ route('register') }}" id="form_pt" class="mt-4 hidden" enctype="multipart/form-data">
        @csrf
        <!-- Name -->
        <div class="grid grid-rows-3 grid-flow-col gap-4">
            <div class="row-span-3 ...">
                <div>
                    <x-input-label for="name_pt" :value="__('Nama Kaprodi')" />
                    <x-text-input id="name_pt" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <!-- namapt -->
                <div class="mt-4 hidden">
                    <x-input-label for="usertype" :value="__('PT Field')" />
                    <x-text-input id="usertype" class="block mt-1 w-full" type="text" name="usertype" value="pt" required autocomplete="usertype" />
                    <x-input-error :messages="$errors->get('usertype')" class="mt-2" />
                </div>
                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email_pt" :value="__('Email')" />
                    <x-text-input id="email_pt" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- nidn -->
                <div class="mt-4">
                    <x-input-label for="nidn" :value="__('NIDN')" />
                    <x-text-input id="nidn" class="block mt-1 w-full" type="number" name="nidn" :value="old('nidn')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('nidn')" class="mt-2" />
                </div>
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password_pt" :value="__('Password')" />
                    <x-text-input id="password_pt" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation_pt" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation_pt" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>
            <div class="col-span-3 row-span-3 ...">
                <!-- namapt -->
                <div class="">
                    <x-input-label for="namapt" :value="__('Nama Perguruan Tinggi')" />
                    <x-text-input id="namapt" class="block mt-1 w-full" type="text" name="namapt" :value="old('namapt')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('namapt')" class="mt-2" />
                </div>
                
                <!-- namapengelola -->
                <div class="mt-4">
                    <x-input-label for="namapengelola" :value="__('Nama Pengelola Prodi')" />
                    <x-text-input id="namapengelola" class="block mt-1 w-full" type="text" name="namapengelola" :value="old('namapengelola')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('namapengelola')" class="mt-2" />
                </div>

                <!-- alamat -->
                <div class="mt-4">
                    <x-input-label for="alamat" :value="__('Alamat Perguruan Tinggi')" />
                    <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                </div>

                <!-- kodept -->
                <div class="mt-4">
                    <x-input-label for="kodept" :value="__('Kode Perguruan Tinggi')" />
                    <x-text-input id="kodept" class="block mt-1 w-full" type="number" name="kodept" :value="old('kodept')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('kodept')" class="mt-2" />
                </div>

                <!-- notelepon -->
                <div class="mt-4">
                    <x-input-label for="telp" :value="__('No Telepon')" />
                    <x-text-input id="telp" class="block mt-1 w-full" type="text" name="telp" :value="old('telp')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('telp')" class="mt-2" />
                </div>
                
            </div>

            <div class="col-span-3 row-span-3 ...">
                <!-- berkas1 -->
                <div class="">
                    <x-input-label for="berkas1" :value="__('Berkas 1 Bukti Pembayaran')" />
                    <label for="berkas1" class="sr-only">Choose file</label>
                    <input type="file" name="berkas1"  accept=".jpg, .jpeg, .png, .pdf" id="berkas1" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                        file:bg-gray-50 file:border-0
                        file:me-4
                        file:py-3 file:px-4
                    ">
                    <x-input-error :messages="$errors->get('namapt')" class="mt-2" />
                </div>
                
                <!-- berkas2 -->
                <div class="mt-4">
                    <x-input-label for="berkas2" :value="__('Berkas 2 Surat Keterangan')" />
                    <input type="file" name="berkas2"  accept=".jpg, .jpeg, .png, .pdf" id="berkas2" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                        file:bg-gray-50 file:border-0
                        file:me-4
                        file:py-3 file:px-4
                    ">
                    <x-input-error :messages="$errors->get('berkas2')" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end mt-4 ">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
    </form>
</x-guest-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('usertype_toggle');
        const formDosen = document.getElementById('form_dosen');
        const formPT = document.getElementById('form_pt');

        toggle.addEventListener('change', function () {
            if (toggle.checked) {
                formDosen.classList.add('hidden');
                formPT.classList.remove('hidden');
            } else {
                formDosen.classList.remove('hidden');
                formPT.classList.add('hidden');
            }
        });
    });
</script>

<style>
    input[type="checkbox"].hidden {
        display: none;
    }

    label[for="usertype_toggle"] div.relative {
        cursor: pointer;
    }

    label[for="usertype_toggle"] div.relative div {
        background-color: #d1d5db;
        border-radius: 9999px;
    }

    label[for="usertype_toggle"] div.relative div:last-child {
        background-color: #ffffff;
        transform: translateX(0);
    }

    input[type="checkbox"]:checked + label[for="usertype_toggle"] div.relative div:last-child {
        transform: translateX(48px);
    }
</style>

