<x-app-layout>
    <div class="w-full sm:max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-3 sm:p-6 bg-sky-900 overflow-hidden shadow-sm sm:rounded-lg">
            @auth
                <x-welcome-message title="Get started creating a <span class='text-teal-300'>New Team</span>"
                    subtitle="Do you want to create a new team? With Ultimate League is possible, just press the button and follow the instructions." />
                <x-a-button-green route="teams.create" label="Create Team" />
            @endauth
            @guest
                <x-welcome-message title="Get started! Have a look at the <span class='text-teal-300'>Teams List.</span>"
                    subtitle="Do you want to create your own team? With Ultimate League is possible, just register and follow the instructions." />
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
                            <th scope="col" class="px-3 sm:px-1 py-3 text-center">
                                Logo
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3 hidden sm:table-cell">
                                League
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3 hidden sm:table-cell">
                                Stadium
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3 text-center">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teams as $team)
                            <tr class="bg-cyan-700 border-b border-cyan-950 hover:bg-cyan-800">
                                <td class="px-3 sm:px-1 py-3">
                                    <div class="flex items-center justify-center">
                                        <img class="w-10 h-10" src="{{ asset('storage/' . $team->logo) }}"
                                            alt="{{ $team->name }} logo">
                                    </div>
                                </td>
                                <th scope="row"
                                    class="px-3 sm:px-6 py-4 text-white">
                                    <div class="text-base font-semibold">{{ $team->name }}</div>
                                    <div class="font-normal text-gray-300">{{ $team->city }}</div>
                                </th>
                                <td class="px-3 sm:px-6 py-4 text-white text-base font-semibold hidden sm:table-cell">
                                    {{ $team->league->name ?? 'N/A' }}
                                </td>
                                <td class="px-3 sm:px-6 py-4 text-white text-base font-semibold hidden sm:table-cell">
                                    <div class="text-base font-semibold">{{ $team->stadium_name }}</div>
                                    <div class="font-normal text-gray-300">
                                        {{ $team->stadium_capacity ? 'Capacity: ' . $team->stadium_capacity : '' }}
                                    </div>
                                </td>
                                <td class="px-3 sm:px-6 py-4 text-base">
                                    <div class="flex space-x-4 justify-center">
                                        <a href="{{ route('teams.show', $team->id) }}"
                                            class="text-blue-200 hover:text-blue-400" title="View Details">
                                            <i
                                                class="fa-solid fa-magnifying-glass fa-xl hover:scale-150 transition-transform duration-200"></i>
                                        </a>
                                        <a href="{{ route('teams.edit', $team->id) }}"
                                            class="text-amber-400 hover:text-amber-600" title="Edit Team">
                                            <i
                                                class="fa-regular fa-pen-to-square fa-xl hover:scale-150 transition-transform duration-200"></i>
                                        </a>
                                        <form method="POST" action="{{ route('teams.destroy', $team) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete the team?')"
                                                class="text-red-400 hover:text-red-600" title="Delete Team">
                                                <i
                                                    class="fa-regular fa-trash-can fa-xl hover:scale-150 transition-transform duration-200"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="flex items-center justify-center p-4">
                {!! $teams->withQueryString()->links('components.pagination') !!}
            </div>
            @auth
                <x-subtitle-message subtitle="Recover a Team"
                    text="Have you deleted a team by accident? With Ultimate League you can recover the team just pressing the button and following the instructions." />
                <x-a-button-green route="teams.deleted" label="Recover a Deleted Team" />
            @endauth
        </div>
    </div>
</x-app-layout>
