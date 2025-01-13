<x-app-layout>
    <div class="w-full sm:max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-sky-900 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="text-center">
                <x-welcome-message title="Details of <span class='text-teal-300'>Game</span>"
                    subtitle="Soon you'll be able to see the details of the game selected" />
            </div>
            <div class="flex justify-center items-center my-4">
                <x-a-button-red route="games.index" label="Return to Games" />
            </div>
        </div>
    </div>
</x-app-layout>
