<x-app-layout>
    <div class="w-full sm:max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-3 sm:p-6 bg-sky-900 overflow-hidden shadow-sm sm:rounded-lg">
            @auth
                <x-welcome-message title="Get started creating a <span class='text-teal-300'>New Game</span>"
                    subtitle="Do you want to create a new game? With Ultimate League is possible, just press the button and follow the instructions." />
                <x-a-button-green route="games.create" label="Create Game" />
            @endauth
            @guest
                <x-welcome-message title="Get started! Have a look at the <span class='text-teal-300'>Games List.</span>"
                    subtitle="Do you want to create your own games? With Ultimate League is possible, just register and follow the instructions." />
            @endguest

            <!-- Select League Dropdown -->
            <div class="flex items-center justify-center p-4">
                <form method="POST" action="{{ route('select-league') }}" class="flex flex-row items-center">
                    @csrf
                    <select name="league_id"
                        class="px-3 py-1 mr-4 text-white bg-gray-900 border border-green-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                        @foreach ($leagues as $league)
                            <option value="{{ $league->id }}"
                                {{ session('league_id') == $league->id ? 'selected' : '' }}>
                                {{ $league->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-button-green>
                        {{ __('Select League') }}
                    </x-button-green>
                </form>
            </div>

            <div class="relative overflow-x-auto shadow-md rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-400">
                    <thead class="text-s text-gray-200 uppercase bg-sky-950">
                        <tr>
                            <th scope="col" class="px-3 sm:px-6 py-3 hidden md:table-cell">
                                League
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3 text-center">
                                Home Team
                            </th>
                            <th scope="col" class="px-2 py-3 text-center">
                                Result
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3 text-center">
                                Away Team
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3 text-center hidden md:table-cell">
                                Date
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3 text-center">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through the games, save the matchweek as key and each game as value in the $gamesInMatchweek variable -->
                        @foreach ($games as $matchweek => $gamesInMatchweek)
                            <tr>
                                <th colspan="6" class="px-3 sm:px-6 py-1 text-white text-base font-semibold text-center">
                                    Matchweek {{ $matchweek }}
                                </th>
                            </tr>
                            <!-- Loop through the games in the matchweek -->
                            @foreach ($gamesInMatchweek as $game)
                                <tr class="bg-cyan-700 border-b border-cyan-950 hover:bg-cyan-800">
                                    <td class="px-3 sm:px-6 py-4 text-white text-base font-semibold hidden md:table-cell">
                                        {{ $game->league->name }}
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 text-white text-base font-semibold">
                                        <div class="flex items-center justify-center md:justify-end">
                                            <span class="hidden md:inline">{{ $game->homeTeam->name }}</span>
                                            <img class="md:ml-2 w-10 h-10"
                                                src="{{ asset('storage/' . $game->homeTeam->logo) }}"
                                                alt="{{ $game->homeTeam->name }} logo">
                                        </div>
                                    </td>
                                    <td class="px-2 py-4 text-white text-base font-semibold text-center">
                                        {{ $game->home_team_goals }} - {{ $game->away_team_goals }}
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 text-white text-base font-semibold">
                                        <div class="flex items-center justify-center md:justify-start">
                                            <img class="md:mr-2 w-10 h-10"
                                                src="{{ asset('storage/' . $game->awayTeam->logo) }}"
                                                alt="{{ $game->awayTeam->name }} logo">
                                                <span class="hidden md:inline">{{ $game->awayTeam->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 text-white text-base font-semibold text-center hidden md:table-cell">
                                        {{ \Carbon\Carbon::parse($game->date)->translatedFormat('D d/m/Y H:i') }}
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 text-base">
                                        <div class="flex space-x-4 justify-center">
                                            <a href="{{ route('games.show', $game->id) }}"
                                                class="text-blue-200 hover:text-blue-400" title="View Details">
                                                <i
                                                    class="fa-solid fa-magnifying-glass fa-xl hover:scale-150 transition-transform duration-200"></i>
                                            </a>
                                            <a href="{{ route('games.edit', $game->id) }}"
                                                class="text-amber-400 hover:text-amber-600" title="Edit Game">
                                                <i
                                                    class="fa-regular fa-pen-to-square fa-xl hover:scale-150 transition-transform duration-200"></i>
                                            </a>
                                            <form method="POST" action="{{ route('games.destroy', $game) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete the game?')"
                                                    class="text-red-400 hover:text-red-600" title="Delete Game">
                                                    <i
                                                        class="fa-regular fa-trash-can fa-xl hover:scale-150 transition-transform duration-200"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
