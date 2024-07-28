<section>
    <header>
        @if($user->usertype == "pt")

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Personal Profile Perguruan Tinggi Information') }}
        </h2>

        @elseif($user->usertype == "user")

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Personal Profile Dosen Information') }}
        </h2>

        @else

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Personal Profile Information') }}
        </h2>

        @endif

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    @if($user->usertype == "pt")
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6 ">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nama PT')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="Nidn" :value="__('NIDN')" />
            <x-text-input id="nidn" name="nidn" type="text" class="mt-1 block w-full" :value="old('nidn', $Data->nidn)" required autofocus autocomplete="nidn" />
            <x-input-error class="mt-2" :messages="$errors->get('nidn')" />
        </div>

        <div>
            <x-input-label for="kodept" :value="__('Kode PT')" />
            <x-text-input id="kodept" name="kodept" type="text" class="mt-1 block w-full" :value="old('kodept', $Data->kodept)" required autofocus autocomplete="kodept" />
            <x-input-error class="mt-2" :messages="$errors->get('kodept')" />
        </div>

        <div>
            <x-input-label for="telp" :value="__('telp')" />
            <x-text-input id="telp" name="telp" type="text" class="mt-1 block w-full" :value="old('nidn', $Data->nidn)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('telp')" />
        </div>

        <div>
            <x-input-label for="namapengelola" :value="__('Nama Pengelola')" />
            <x-text-input id="namapengelola" name="namapengelola" type="text" class="mt-1 block w-full" :value="old('namapengelola', $Data->namapengelola)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('namapengelola')" />
        </div>

                <div>
            <x-input-label for="namakaprodi" :value="__('Nama Kaprodi')" />
            <x-text-input id="namakaprodi" name="namakaprodi" type="text" class="mt-1 block w-full" :value="old('namakaprodi', $Data->namakaprodi)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('namakaprodi')" />
        </div>
        

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

    @elseif($user->usertype == "user")

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6 ">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nama Dosen')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="Nidn" :value="__('NIDN')" />
            <x-text-input id="nidn" name="nidn" type="text" class="mt-1 block w-full" :value="old('nidn', $Data->nidn)" required autofocus autocomplete="nidn" />
            <x-input-error class="mt-2" :messages="$errors->get('nidn')" />
        </div>

        <div>
            <x-input-label for="telp" :value="__('Telpon')" />
            <x-text-input id="telp" name="telp" type="text" class="mt-1 block w-full" :value="old('notelp', $Data->notelp)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('telp')" />
        </div>

        

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

    @else

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6 ">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

    @endif

    
</section>
