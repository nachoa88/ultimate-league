<x-app-layout>
    <div class="w-full sm:max-w-md mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-sky-900 overflow-hidden shadow-sm sm:rounded-lg">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="relative z-0 w-full mb-5 group">
                    <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus
                        autocomplete="name" />
                    <x-input-label for="name" :value="__('Name')" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="relative z-0 w-full mb-5 group">
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required
                        autocomplete="username" />
                    <x-input-label for="email" :value="__('Email')" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="relative z-0 w-full mb-5 group">
                    <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />
                    <x-input-label for="password" :value="__('Password')" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="relative z-0 w-full mb-5 group">
                    <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
                        autocomplete="new-password" />
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-200 hover:text-teal-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-200"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button-red class="ms-4">
                        {{ __('Register') }}
                    </x-button-red>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
