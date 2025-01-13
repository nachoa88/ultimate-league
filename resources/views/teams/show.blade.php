<x-app-layout>
    <div class="w-full sm:max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-sky-900 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="text-center">
                <x-welcome-message title="Details of Team: <span class='text-teal-300'>{{ $team->name }}</span>" />
            </div>
            <div class="flex justify-center items-center">
                <div class="w-full max-w-sm bg-cyan-700 border border-cyan-950 rounded-lg shadow">
                    <div class="flex justify-center items-center p-6">
                        <img class="w-24 h-24 mr-6 md:mr-8 lg:mr-12" src="{{ asset('storage/' . $team->logo) }}"
                            alt="{{ $team->name }} image" />
                        <div>
                            <h3 class="mb-1 text-xl font-medium text-white">{{ $team->name }}</h3>
                            <span class="text-lg text-gray-200">{{ $team->league->name ?? '' }}</span>
                        </div>
                    </div>
                    <div class="border-t border-cyan-950 p-4 text-center">
                        <h5 class="mb-1 text-xl font-medium text-white">Stadium</h5>
                        <p class="text-lg text-gray-200">Name: {{ $team->stadium_name ?? 'N/A' }}</p>
                        <p class="text-lg text-gray-200">Capacity: {{ $team->stadium_capacity ?? 'N/A' }}</p>
                    </div>
                    <div class="border-t border-cyan-950 p-4 text-center">
                        <p class="mb-1 text-lg font-medium text-white">Country: <span
                                class="text-gray-200">{{ $team->country }}</span></p>
                        <p class="b-1 text-lg font-medium text-white">City: <span
                                class="text-gray-200">{{ $team->city }}</span></p>
                    </div>
                    <div class="border-t border-cyan-950 p-4">
                        <div class="flex justify-center">
                            <h5 class="text-lg font-medium text-white">Year of Foundation: <span
                                    class="text-gray-200">{{ $team->founded ?? 'N/A' }}</span></h5>
                        </div>
                    </div>
                    <div class="flex justify-center items-center my-4">
                        <x-a-button-red route="teams.index" label="Return to Teams" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
