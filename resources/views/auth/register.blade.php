<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" />
    <style>
        /* Custom styles for better mobile experience */
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 2.5; /* Adjust for better touch experience */
        }
        .select2-container--default .select2-selection--single {
            height: 2.5rem; /* Adjust for better touch experience */
        }
    </style>

<!-- Include Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Include Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="col-span-1 md:col-span-2">
            <x-input-label for="namadosen" :value="__('Nama Dosen')" />
            <x-text-input id="namadosen" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="hidden">
            <x-input-label for="usertype" :value="__('PT Field')" />
            <x-text-input id="usertype" class="block mt-1 w-full" type="text" name="usertype" value="user" required autocomplete="usertype" />
            <x-input-error :messages="$errors->get('usertype')" class="mt-2" />
        </div>

        <div class="col-span-1">
            <x-input-label for="email_pt" :value="__('Email')" />
            <x-text-input id="email_pt" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="col-span-1">
            <x-input-label for="nidn" :value="__('NIDN')" />
            <x-text-input id="nidn" class="block mt-1 w-full" type="number" name="nidn" :value="old('nidn')" required autocomplete="username" max="9999999999" oninput="limitDigits(this, 10)" />
            <x-input-error :messages="$errors->get('nidn')" class="mt-2" />
        </div>

        <div class="col-span-1">
            <x-input-label for="password_pt" :value="__('Password')" />
            <x-text-input id="password_pt" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="col-span-1">
            <x-input-label for="password_confirmation_pt" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation_pt" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="col-span-1">
            <div class="flex items-center">
                <x-input-label for="id_pt" :value="__('Asal Perguruan Tinggi')" />
                <div class="ml-2 relative group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-blue-400">
                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                    </svg>
                    <div class="absolute left-full ml-2 top-1/2 transform -translate-y-1/2 w-48 bg-gray-800 text-white text-xs rounded-lg p-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        Apabila Perguruan Tinggi Anda Belum Ada Mohon Hubungi Kaprodi Anda Untuk Mendaftarkannya Di APBISDI Terlebih Dahulu
                    </div>
                </div>
            </div>
            <select id="id_pt" name="id_pt" class="block mt-1 w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500" required autocomplete="username">
                <option value="" disabled selected>Pilih Asal Universitas</option>
                @foreach ($ptData as $pt)
                    <option value="{{ $pt['id_user'] }}">{{ $pt['namapt'] }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('id_pt')" class="mt-2" />
        </div>

        <div class="col-span-1">
            <x-input-label for="telp" :value="__('No Telepon')" />
            <x-text-input id="telp" class="block mt-1 w-full" type="text" name="telp" :value="old('telp')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('telp')" class="mt-2" />
        </div>

        <div class="col-span-1">
            <x-input-label for="dokumen1" :value="__('Berkas 1 Bukti Pembayaran')" />
            <input type="file" name="dokumen1" accept=".jpg, .jpeg, .png, .pdf" id="dokumen1" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500">
            <x-input-error :messages="$errors->get('dokumen1')" class="mt-2" />
        </div>

        <div class="col-span-1">
            <x-input-label for="dokumen2" :value="__('Berkas 2 Surat Keterangan')" />
            <input type="file" name="dokumen2" accept=".jpg, .jpeg, .png, .pdf" id="dokumen2" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500">
            <x-input-error :messages="$errors->get('dokumen2')" class="mt-2" />
        </div>

        <div class="col-span-1">
            <x-input-label for="gambar" :value="__('Foto Wajah 3x4')" />
            <input type="file" name="gambar" accept=".jpg, .jpeg, .png," id="gambar" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500">
            <x-input-error :messages="$errors->get('gambar')" class="mt-2" />
        </div>

    </div>

    <div class="flex flex-col md:flex-row items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mb-4 md:mb-0" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>
        <div class="flex items-center ms-4">
            <input type="checkbox" id="termsCheckboxDosen" class="mr-2">
            <label for="termsCheckboxDosen" class="text-sm text-gray-600">I agree to the terms and conditions</label>
        </div>
        <x-primary-button id="registerButtonDosen" class="ms-4 bg-gray-500 cursor-not-allowed" disabled>
            {{ __('Register as Dosen') }}
        </x-primary-button>
    </div>
</form>

    <!-- Form for PT -->
<form method="POST" action="{{ route('register') }}" id="form_pt" class="mt-4 hidden" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="col-span-1">
            <div>
                <x-input-label for="name_pt" :value="__('Nama Kaprodi')" />
                <x-text-input id="name_pt" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mt-4 hidden">
                <x-input-label for="usertype" :value="__('PT Field')" />
                <x-text-input id="usertype" class="block mt-1 w-full" type="text" name="usertype" value="pt" required autocomplete="usertype" />
                <x-input-error :messages="$errors->get('usertype')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="email_pt" :value="__('Email')" />
                <x-text-input id="email_pt" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="nidn" :value="__('NIDN')" />
                <x-text-input id="nidn" class="block mt-1 w-full" type="number" name="nidn" :value="old('nidn')" required autocomplete="username" max="9999999999" oninput="limitDigits(this, 10)" />
                <x-input-error :messages="$errors->get('nidn')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="password_pt" :value="__('Password')" />
                <x-text-input id="password_pt" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="password_confirmation_pt" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation_pt" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
                        
            <div class="mt-4">
                <x-input-label for="gambar" :value="__('Logo Institusi')" />
                <input type="file" name="gambar" accept=".jpg, .jpeg, .png," id="gambar" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                    file:bg-gray-50 file:border-0
                    file:me-4
                    file:py-3 file:px-4">
                <x-input-error :messages="$errors->get('gambar')" class="mt-2" />
            </div>
        </div>
        <div class="col-span-1">
            <div>
                <x-input-label for="namapt" :value="__('Nama Perguruan Tinggi')" />
                <x-text-input id="namapt" class="block mt-1 w-full" type="text" name="namapt" :value="old('namapt')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('namapt')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="namapengelola" :value="__('Nama Pengelola Prodi')" />
                <x-text-input id="namapengelola" class="block mt-1 w-full" type="text" name="namapengelola" :value="old('namapengelola')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('namapengelola')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="alamat" :value="__('Alamat Perguruan Tinggi')" />
                <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="kodept" :value="__('Kode Perguruan Tinggi')" />
                <x-text-input id="kodept" class="block mt-1 w-full" type="number" name="kodept" :value="old('kodept')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('kodept')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="telp" :value="__('No Telepon')" />
                <x-text-input id="telp" class="block mt-1 w-full" type="text" name="telp" :value="old('telp')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('telp')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="berkas1" :value="__('Berkas 1 Bukti Pembayaran')" />
                <label for="berkas1" class="sr-only">Choose file</label>
                <input type="file" name="berkas1" accept=".jpg, .jpeg, .png, .pdf" id="berkas1" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                    file:bg-gray-50 file:border-0
                    file:me-4
                    file:py-3 file:px-4">
                <x-input-error :messages="$errors->get('berkas1')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="berkas2" :value="__('Berkas 2 Surat Keterangan')" />
                <input type="file" name="berkas2" accept=".jpg, .jpeg, .png, .pdf" id="berkas2" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                    file:bg-gray-50 file:border-0
                    file:me-4
                    file:py-3 file:px-4">
                <x-input-error :messages="$errors->get('berkas2')" class="mt-2" />
            </div>

        </div>
    </div>
    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>
        <div class="flex items-center ms-4">
            <input type="checkbox" id="termsCheckboxPT" class="mr-2">
            <label for="termsCheckboxPT" class="text-sm text-gray-600">I agree to the terms and conditions</label>
        </div>
        <x-primary-button id="registerButtonPT" class="ms-4 bg-gray-500 cursor-not-allowed" disabled>
            {{ __('Register as PT') }}
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

<script>
    function limitDigits(input, maxDigits) {
        if (input.value.length > maxDigits) {
            input.value = input.value.slice(0, maxDigits);
        }
    }
</script>

<script>
    $(document).ready(function() {
        $('#id_pt').select2({
            placeholder: 'Pilih Asal Universitas',
            allowClear: true,
            theme: 'bootstrap'
        });
    });
</script>

<script>
// Enable/Disable register button for Dosen
        document.getElementById('termsCheckboxDosen').addEventListener('change', function() {
            if (this.checked) {
                registerButtonDosen.disabled = false;
                registerButtonDosen.classList.remove('bg-gray-500', 'cursor-not-allowed');
                registerButtonDosen.classList.add('bg-indigo-500', 'cursor-pointer');
            } else {
                registerButtonDosen.disabled = true;
                registerButtonDosen.classList.remove('bg-indigo-500', 'cursor-pointer');
                registerButtonDosen.classList.add('bg-gray-500', 'cursor-not-allowed');
            }
        });

        // Enable/Disable register button for PT
        document.getElementById('termsCheckboxPT').addEventListener('change', function() {
            if (this.checked) {
                registerButtonPT.disabled = false;
                registerButtonPT.classList.remove('bg-gray-500', 'cursor-not-allowed');
                registerButtonPT.classList.add('bg-indigo-500', 'cursor-pointer');
            } else {
                registerButtonPT.disabled = true;
                registerButtonPT.classList.remove('bg-indigo-500', 'cursor-pointer');
                registerButtonPT.classList.add('bg-gray-500', 'cursor-not-allowed');
            }
        });
</script>