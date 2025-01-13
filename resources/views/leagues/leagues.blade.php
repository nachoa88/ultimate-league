<x-app-layout>
    <div class="w-full sm:max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-3 sm:p-6 bg-sky-900 overflow-hidden shadow-sm sm:rounded-lg">
            @auth
                <x-welcome-message title="Get started creating a <span class='text-teal-300'>New League</span>"
                    subtitle="Do you want to create a new league? With Ultimate League is possible, just press the button and follow the instructions." />
                <x-a-button-green route="leagues.create" label="Create League" />
            @endauth
            @guest
                <x-welcome-message title="Get started! Have a look at the <span class='text-teal-300'>Leagues List.</span>"
                    subtitle="Do you want to create your own league? With Ultimate League is possible, just register and follow the instructions." />
            @endguest

            <div class="relative overflow-x-auto shadow-md rounded-lg mt-8">
                @if (session('error'))
                    <div class="mb-2 text-red-500 text-lg text-center">{{ session('error') }}</div>
                @endif
                <table class="w-full text-sm text-left rtl:text-right text-gray-400">
                    <thead class="text-s text-gray-200 uppercase bg-sky-950">
                        <tr>
                            <th scope="col" class="px-3 sm:px-1 py-3 text-center hidden sm:table-cell">
                                Level
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3">
                                Country
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3 text-center hidden sm:table-cell">
                                Nº Teams
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3 text-center">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leagues as $league)
                            <tr class="bg-cyan-700 border-b border-cyan-950 hover:bg-cyan-800">
                                <td class="px-3 sm:px-1 py-3 text-white text-base font-semibold text-center hidden sm:table-cell">
                                    {{ $league->level }}
                                </td>
                                <td class="px-3 sm:px-6 py-4 text-white text-base font-semibold">
                                    {{ $league->name }}
                                </td>
                                <td class="px-3 sm:px-6 py-4 text-white text-base font-semibold">
                                    {{ $league->country }}
                                </td>
                                <td class="px-3 sm:px-6 py-4 text-white text-base font-semibold text-center hidden sm:table-cell">
                                    {{ $league->teams_number }}
                                </td>
                                <td class="px-3 sm:px-6 py-4 text-base">
                                    <div class="flex space-x-4 justify-center">
                                        <a href="{{ route('leagues.show', $league->id) }}"
                                            class="text-blue-200 hover:text-blue-400" title="View Details">
                                            <i
                                                class="fa-solid fa-magnifying-glass fa-xl hover:scale-150 transition-transform duration-200"></i>
                                        </a>
                                        <a href="{{ route('leagues.edit', $league->id) }}"
                                            class="text-amber-400 hover:text-amber-600" title="Edit League">
                                            <i
                                                class="fa-regular fa-pen-to-square fa-xl hover:scale-150 transition-transform duration-200"></i>
                                        </a>
                                        <form method="POST" action="{{ route('leagues.destroy', $league) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete the league?')"
                                                class="text-red-400 hover:text-red-600" title="Delete League">
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
                {!! $leagues->withQueryString()->links('components.pagination') !!}
            </div>
        </div>
    </div>
</x-app-layout>
