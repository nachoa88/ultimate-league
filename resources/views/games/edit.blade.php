<x-app-layout>
    <div class="w-full sm:max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-sky-900 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="text-center">
                <x-welcome-message title="You're editing the <span class='text-teal-300'>Game</span>" />
            </div>
            <div class="p-4 bg-sky-900 overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('games.update', $game) }}" enctype="multipart/form-data"
                    class="max-w-md mx-auto">
                    @csrf
                    @method('PUT')
                    <!-- Team's League Name -->
                    <div class="relative z-0 w-full mb-5 group">
                        <select name="league_id" id="league_id"
                            class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-sky-500 appearance-none focus:outline-none focus:ring-0 focus:border-teal-300 peer">
                            <option class="bg-cyan-950 text-white" value="">Select a league for your game</option>
                            @foreach ($leagues as $league)
                                <option class="bg-cyan-950 text-white" value="{{ $league->id }}"
                                    {{ $league->id == $game->league_id ? 'selected' : '' }}> {{ $league->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="league_id"
                            class="peer-focus:font-medium absolute text-sm text-gray-200 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-teal-300 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            League Name</label>
                        @error('league_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Game's Date & Matchweek -->
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="datetime-local" name="date" id="date" value="{{ $game->date }}"
                                class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-sky-500 appearance-none focus:outline-none focus:ring-0 focus:border-teal-300 peer"
                                placeholder=" " required />
                            <label for="date"
                                class="peer-focus:font-medium absolute text-sm text-gray-200 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-teal-300 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Game's Date</label>
                            @error('date')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="number" name="matchweek" id="matchweek" value = "{{ $game->matchweek }}"
                                class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-sky-500 appearance-none focus:outline-none focus:ring-0 focus:border-teal-300 peer"
                                placeholder=" " required />
                            <label for="matchweek"
                                class="peer-focus:font-medium absolute text-sm text-gray-200 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-teal-300 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Matchweek</label>
                            @error('matchweek')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- Home Team & Score Selection -->
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                            <select name="home_team_id" id="home_team_id"
                                class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-sky-500 appearance-none focus:outline-none focus:ring-0 focus:border-teal-300 peer"
                                required>
                                @foreach ($teams as $team)
                                    <option class="bg-cyan-950 text-white" value="{{ $team->id }}"
                                        {{ $game->home_team_id == $team->id ? 'selected' : '' }}>
                                        {{ $team->name }}</option>
                                @endforeach
                            </select>
                            <label for="home_team_id"
                                class="peer-focus:font-medium absolute text-sm text-gray-200 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-teal-300 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Home Team</label>
                            @error('home_team_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="number" name="home_team_goals" id="home_team_goals"
                                value="{{ $game->home_team_goals }}"
                                class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-sky-500 appearance-none focus:outline-none focus:ring-0 focus:border-teal-300 peer"
                                placeholder=" " required />
                            <label for="home_team_goals"
                                class="peer-focus:font-medium absolute text-sm text-gray-200 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-teal-300 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Home Team Goals</label>
                            @error('home_team_goals')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- Away Team & Score Selection -->
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                            <select name="away_team_id" id="away_team_id"
                                class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-sky-500 appearance-none focus:outline-none focus:ring-0 focus:border-teal-300 peer"
                                required>
                                @foreach ($teams as $team)
                                    <option class="bg-cyan-950 text-white" value="{{ $team->id }}"
                                        {{ $game->away_team_id == $team->id ? 'selected' : '' }}>
                                        {{ $team->name }}</option>
                                @endforeach
                            </select>
                            <label for="away_team_id"
                                class="peer-focus:font-medium absolute text-sm text-gray-200 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-teal-300 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Away Team</label>
                            @error('away_team_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="number" name="away_team_goals" id="away_team_goals"
                                value="{{ $game->away_team_goals }}"
                                class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-sky-500 appearance-none focus:outline-none focus:ring-0 focus:border-teal-300 peer"
                                placeholder=" " required />
                            <label for="away_team_goals"
                                class="peer-focus:font-medium absolute text-sm text-gray-200 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-teal-300 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Away Team Goals</label>
                            @error('away_team_goals')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- Submit & Return buttons -->
                    <div class="flex justify-center">
                        <x-a-button-red class="me-3" route="games.index" label="Return" />
                        <x-button-green>{{ __('Update Game') }}</x-button-green>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
