<x-app-layout>
    <div class="w-full sm:max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-sky-900 overflow-hidden shadow-sm sm:rounded-lg">
            <x-welcome-message title="Restoring a <span class='text-teal-300'>Deleted Team</span>"
                subtitle="Here you have a list of all the teams that have been deleted, select the one you want to restore and press the button." />
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-400">
                    <thead class="text-s text-gray-200 uppercase bg-sky-950">
                        <tr>
                            <th scope="col" class="px-1 py-3 text-center">
                                Logo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                League
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Stadium
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Fundation
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Recover
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teams as $team)
                            <tr class="bg-cyan-700 border-b border-cyan-950 hover:bg-cyan-800">
                                <td class="px-1 py-3 ">
                                    <div class="flex items-center justify-center">
                                        <img class="w-10 h-10" src="{{ asset('storage/' . $team->logo) }}"
                                            alt="{{ $team->name }} logo">
                                    </div>
                                </td>
                                <th scope="row"
                                    class="flex flex-col items-start px-6 py-4 text-white whitespace-nowrap">
                                    <div class="text-base font-semibold">{{ $team->name }}</div>
                                    <div class="font-normal text-gray-300">{{ $team->city }}</div>
                                </th>
                                <td class="px-6 py-4 text-white text-base font-semibold">
                                    {{ $team->league->name ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 text-white text-base font-semibold">
                                    <div class="text-base font-semibold">{{ $team->stadium_name }}</div>
                                    <div class="font-normal text-gray-300">{{ $team->stadium_capacity }}</div>
                                </td>
                                <td class="px-6 py-4 text-white text-base font-semibold text-center">
                                    {{ $team->founded }}
                                </td>
                                <td class="px-6 py-4 text-base">
                                    <div class="flex space-x-4 justify-center">
                                        <form method="POST" action="{{ route('teams.restore', $team->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to restore this team?')"
                                                class="text-green-400 hover:text-green-600">
                                                <i
                                                    class="fa-solid fa-arrow-rotate-left fa-xl hover:scale-150 transition-transform duration-200"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
