<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Промени Настан') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-lg font-bold mb-4">Промени Настан</h2>

                <!-- Flash success -->
                @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded-md">
                    {{ session('success') }}
                </div>
                @endif

                <!-- Validation Errors -->
                @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded-md">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('events.update', $event->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Event Name -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Име на Настан</label>
                        <input type="text" name="name" id="name" value="{{ $event->name }}"
                            class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                    </div>

                    <!-- Event Date -->
                    <div class="mb-4">
                        <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Датум</label>
                        <input type="date" name="date" id="date" value="{{ $event->date }}"
                            class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                    </div>

                    <!-- Event Time -->
                    <div class="mb-4">
                        <label for="time" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Час</label>
                        <input type="time" name="time" id="time" value="{{ $event->time }}"
                            class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Опис</label>
                        <textarea name="description" id="description" rows="4"
                            class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            required>{{ $event->description }}</textarea>
                    </div>

                    <!-- Image URL -->
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Слика URL</label>
                        <input type="text" name="image" id="image" value="{{ $event->image }}"
                            class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                    </div>

                    <!-- Submit & Cancel -->
                    <div class="flex items-center justify-between mt-6">

                        <a href="{{ route('events.index') }}"
                            class="underline text-sm text-red-600 dark:text-red-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Откажи') }}
                        </a>

                        <x-primary-button class="px-4 py-2">
                            {{ __('Промени') }}
                        </x-primary-button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>