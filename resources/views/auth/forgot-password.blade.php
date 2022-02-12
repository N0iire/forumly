<x-base-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-logos.main class="w-32 mt-5" />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Lupa kata sandi Anda? Tidak masalah. Cukup beri tahu kami alamat email Anda dan kami akan mengirim email kepada Anda tautan pengaturan ulang kata sandi yang memungkinkan Anda memilih yang baru.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
    <div class="absolute center-0 left-0 ml-36">
        <div class="flex flex-col z-0 items-center mt-20 pt-6  sm:overflow-hidden sm:justify-center sm:pt-0">
     
            <div class="relativew-full py-4 sm:max-w-md rounded-t-md">
              <img src="{{ asset('img/avatars/forgot.svg') }}"  alt="">
            </div>
        </div>
     </div>
</x-base-layout>
