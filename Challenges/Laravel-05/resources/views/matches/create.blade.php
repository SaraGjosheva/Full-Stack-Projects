<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Schedule New Match') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('matches.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="home_team_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ __('Home Team') }}
                        </label>
                        <select id="home_team_id" name="home_team_id"
                            class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-900 text-white placeholder-gray-400 py-2 px-3 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @foreach($teams as $id => $name)
                            <option value="{{ $id }}" {{ old('home_team_id') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                            @endforeach
                        </select>
                        @error('home_team_id')<p class="mt-1 text-red-600 text-sm">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="away_team_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ __('Away Team') }}
                        </label>
                        <select id="away_team_id" name="away_team_id"
                            class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-900 text-white placeholder-gray-400 py-2 px-3 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @foreach($teams as $id => $name)
                            <option value="{{ $id }}" {{ old('away_team_id') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                            @endforeach
                        </select>
                        @error('away_team_id')<p class="mt-1 text-red-600 text-sm">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="scheduled_at" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ __('Scheduled At') }}
                        </label>
                        <input type="datetime-local" name="scheduled_at" id="scheduled_at"
                            value="{{ old('scheduled_at') }}"
                            class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-900 text-white placeholder-gray-400 py-2 px-3 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('scheduled_at')<p class="mt-1 text-red-600 text-sm">{{ $message }}</p>@enderror
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('matches.index') }}"
                            class="mr-4 inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded hover:bg-gray-400 dark:hover:bg-gray-600">
                            {{ __('Cancel') }}
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            {{ __('Save') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>