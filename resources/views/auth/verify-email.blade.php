<x-app-layout>
    <div class="w-full sm:max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-sky-900 overflow-hidden shadow-sm sm:rounded-lg">
            <x-welcome-message 
            title="Welcome to <span class='text-teal-300'>Ultimate League!</span>"
            titleSize="text-2xl md:text-3xl lg:text-4xl" 
            subtitle="Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another." />

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="mt-4 flex items-center justify-between space-x-4">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-button-green class="w-60">
                            {{ __('Resend Verification Email') }}
                        </x-button-green>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-button-red>
                        {{ __('Log Out') }}
                    </x-button-red>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
