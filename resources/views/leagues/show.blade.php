<x-app-layout>
    <div class="w-full sm:max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-sky-900 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="text-center">
                <x-welcome-message title="Details of League: <span class='text-teal-300'>{{ $league->name }}</span>" />
            </div>
            <div class="flex justify-center items-center">
                <div class="w-full max-w-sm bg-cyan-700 border border-cyan-950 rounded-lg shadow text-center">
                    <div class="items-center p-6">
                        <div>
                            <h3 class="mb-1 text-xl font-medium text-white">{{ $league->name }}</h3>
                            <p class="text-lg text-gray-200">{{ $league->country }}</p>
                        </div>
                    </div>
                    <div class="border-t border-cyan-950 p-4">
                        <div>
                            <h5 class="mb-1 text-lg font-medium text-white">League's Level: <span
                                    class="text-gray-200">{{ $levelDescription }}</span></h5>
                        </div>
                    </div>
                    <div class="border-t border-cyan-950 p-4">
                        <p class="mb-1 text-lg font-medium text-white">Nº Teams: <span
                                class="text-gray-200">{{ $league->teams_number }}</span></p>
                    </div>
                    @foreach ($league->teams as $team)
                        <div class="flex items-center justify-start py-2">
                            <div class="px-4">
                                <img class="w-10 h-10" src="{{ asset('storage/' . $team->logo) }}"
                                    alt="{{ $team->name }} logo">
                            </div>
                            <div class="border-l border-gray-200 px-4">
                                <p class="mb-1 text-lg font-medium text-gray-200">{{ $team->name }}</p>
                            </div>
                        </div>
                    @endforeach
                    <div class="flex justify-center items-center my-4">
                        <x-a-button-red route="leagues.index" label="Return to Leagues" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
