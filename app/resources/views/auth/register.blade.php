<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
        <div>
            <x-label for="sei" :value="__('名前')" />
            <!-- sei -->
            <div class="mt-4">
                <x-label for="sei" :value="__('性')" />
                <x-input id="sei" class="mt-1 w-full" type="text" name="sei" :value="old('sei')" required autofocus />
            </div>
            <!-- sei_kana -->
            <div class="mt-4">
                <x-label for="sei_kana" :value="__('せい')" />
                <x-input id="sei_kana" class="mt-1 w-full" type="text" name="sei_kana" :value="old('sei_kana')" required autofocus />
            </div>
            <!-- mei -->
            <div class="mt-4">
                <x-label for="mei" :value="__('名')" />
                <x-input id="mei" class="mt-1 w-full" type="text" name="mei" :value="old('mei')" required autofocus />
            </div>
            <!-- mei_kana -->
            <div class="mt-4">
                <x-label for="mei_kana" :value="__('メイ')" />
                <x-input id="mei_kana" class="mt-1 w-full" type="text" name="mei_kana" :value="old('mei_kana')" required autofocus />
            </div>
        </div>
            <!-- tel -->
            <div class="mt-4">
                <x-label for="tel" :value="__('Tel')" />
                <x-input id="tel" class="mt-1 w-full" type="number" name="tel" :value="old('tel')" required autofocus />
            </div>
            <!-- birthday -->
            <div class="mt-4">
                <x-label for="birthday" :value="__('Birthday')" />
                <x-input id="birthday" class="mt-1 w-full" type="text" name="birthday" :value="old('birthday')" required autofocus />
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
