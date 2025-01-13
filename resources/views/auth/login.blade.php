<x-app-layout>
    <div class="w-full sm:max-w-md mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-sky-900 overflow-hidden shadow-sm sm:rounded-lg">
            
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="relative z-0 w-full mb-5 group">
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                        autocomplete="username" />
                    <x-input-label for="email" :value="__('Email')" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="relative z-0 w-full mb-5 group">
                    <x-text-input id="password" type="password" name="password" required
                        autocomplete="current-password" />
                    <x-input-label for="password" :value="__('Password')" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-sky-500 text-teal-300 shadow-sm focus:ring-teal-300" name="remember">
                        <span class="ms-2 text-sm text-gray-200">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-200 hover:text-teal-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-200"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-button-green class="ms-3">
                        {{ __('Log in') }}
                    </x-button-green>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
