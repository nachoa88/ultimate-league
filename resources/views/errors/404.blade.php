<x-app-layout>
    <div class="w-full sm:max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-sky-900 overflow-hidden shadow-sm sm:rounded-lg">
            <x-welcome-message title="Bad News! <span class='text-teal-300'>Error 404!</span>"
                subtitle="The page you're looking for could not be found, please click in the button to return to the home page." />
            <x-a-button-green route="home" label="Return" />
        </div>
    </div>
</x-app-layout>
