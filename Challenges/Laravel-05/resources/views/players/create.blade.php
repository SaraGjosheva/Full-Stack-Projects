<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Add New Player') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('players.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ __('First Name') }}
                        </label>
                        <input type="text" name="first_name" id="first_name"
                            value="{{ old('first_name') }}"
                            class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-900 py-2 px-3 shadow-sm text-white placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500">
                        @error('first_name')<p class="mt-1 text-red-600 text-sm">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ __('Last Name') }}
                        </label>
                        <input type="text" name="last_name" id="last_name"
                            value="{{ old('last_name') }}"
                            class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-900 py-2 px-3 shadow-sm text-white placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500">
                        @error('last_name')<p class="mt-1 text-red-600 text-sm">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="team_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ __('Team') }}
                        </label>
                        <select id="team_id" name="team_id"
                            class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-900 py-2 px-3 shadow-sm text-white placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500">
                            @foreach($teams as $id => $name)
                            <option value="{{ $id }}" {{ old('team_id') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                            @endforeach
                        </select>
                        @error('team_id')<p class="mt-1 text-red-600 text-sm">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="date_of_birth" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ __('Date of Birth') }}
                        </label>
                        <input type="date" name="date_of_birth" id="date_of_birth"
                            value="{{ old('date_of_birth') }}"
                            class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-900 py-2 px-3 shadow-sm text-white placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500">
                        @error('date_of_birth')<p class="mt-1 text-red-600 text-sm">{{ $message }}</p>@enderror
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('players.index') }}"
                            class="mr-4 inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded hover:bg-gray-400 dark:hover:bg-gray-600">
                            {{ __('Cancel') }}
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                            {{ __('Save') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>