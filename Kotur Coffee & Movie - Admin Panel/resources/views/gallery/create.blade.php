<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Додај Слика во Галеријата') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">


                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded-md">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                @if ($events ->isEmpty())
                    <div class="text-center">
                        <p class="text-gray-500">За сите настани веќе постојат албуми.
                        <a href="{{ route('events.create') }}" class="text-blue-500"> Креирај Настан?</a>
                        </p>
                    </div>
                    
                @else
                    <form action="{{ route('gallery.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="event_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Изберете настан
                        </label>
                        <select name="event_id" id="event_id"
                            class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                            <option value="">-- Изберете настан --</option>
                            @foreach ($events as $event)
                                <option value="{{ $event->id }}">{{ $event->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Изберете слика (URL)
                        </label>
                        <input type="url" name="image" id="image"
                            class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <a href="{{ route('gallery') }}"
                            class="underline text-sm text-red-600 dark:text-red-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Откажи') }}
                        </a>

                        <x-primary-button class="px-4 py-2">
                            {{ __('Креирај галерија') }}
                        </x-primary-button>
                    </div>
                </form>
                @endif
                    
            

            </div>
        </div>
    </div>
</x-app-layout>
