<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Matches') }}
        </h2>
    </x-slot>

    @if (session('success'))
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-green-100 text-green-800 border border-green-200 rounded-md px-6 py-4">
            {{ session('success') }}
        </div>
    </div>
    @endif

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                @if(auth()->check() && auth()->user()->role === 'admin')
                <div class="flex justify-end mb-4">
                    <a href="{{ route('matches.create') }}"
                        class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        {{ __('+ Add Match') }}
                    </a>
                </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    {{ __('Date') }}
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    {{ __('Home Team') }}
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    {{ __('Away Team') }}
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    {{ __('Score') }}
                                </th>
                                @if(auth()->check() && auth()->user()->role === 'admin')
                                <th class="px-6 py-3"></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($matches as $match)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                    {{ $match->scheduled_at }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                    {{ $match->homeTeam->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                    {{ $match->awayTeam->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                    @if(!is_null($match->home_score))
                                    {{ $match->home_score }} - {{ $match->away_score }}
                                    @else
                                    &mdash;
                                    @endif
                                </td>
                                @if(auth()->check() && auth()->user()->role === 'admin')
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('matches.edit', $match) }}"
                                        class="text-indigo-600 hover:text-indigo-900 mr-2">
                                        {{ __('Edit') }}
                                    </a>
                                    <form action="{{ route('matches.destroy', $match) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Are you sure?');">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $matches->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>