<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Креирај Резервација за Коктел') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">

                <!-- Display success messages if any -->
                @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
                @endif

                @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('cocktail.reservations.store') }}">
                    @csrf

                    <!-- Full Name -->
                    <div class="mb-4">
                        <x-input-label for="full_name" :value="__('Име и Презиме')" />
                        <x-text-input id="full_name" name="full_name" type="text"
                            class="block mt-1 w-full"
                            :value="old('full_name')" required autofocus />
                        <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Е-пошта')" />
                        <x-text-input id="email" name="email" type="email"
                            class="block mt-1 w-full"
                            :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Event Type -->
                    <div class="mb-4">
                        <x-input-label for="event_type" :value="__('Тип на Настан')" />
                        <x-text-input id="event_type" name="event_type" type="text"
                            class="block mt-1 w-full"
                            :value="old('event_type')" required />
                        <x-input-error :messages="$errors->get('event_type')" class="mt-2" />
                    </div>

                    <!-- Message -->
                    <div class="mb-4">
                        <x-input-label for="message" :value="__('Порака')" />
                        <textarea id="message" name="message"
                            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            rows="4" required>{{ old('message') }}</textarea>
                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                    </div>

                    <!-- Reservation Date -->
                    <div class="mb-4">
                        <x-input-label for="reservation_date" :value="__('Датум на Резервација')" />
                        <x-text-input id="reservation_date" name="reservation_date" type="date"
                            class="block mt-1 w-full"
                            :value="old('reservation_date')" required />
                        <x-input-error :messages="$errors->get('reservation_date')" class="mt-2" />
                    </div>

                    <!-- Reservation Hour -->
                    <div class="mb-4">
                        <x-input-label for="reservation_hour" :value="__('Час на Резервација')" />
                        <x-text-input id="reservation_hour" name="reservation_hour" type="time"
                            class="block mt-1 w-full"
                            :value="old('reservation_hour')" required />
                        <x-input-error :messages="$errors->get('reservation_hour')" class="mt-2" />
                    </div>

                    <!-- Submit Button & Cancel -->
                    <div class="flex items-center justify-between mt-6">

                        <a href="{{ route('cocktail.reservations') }}"
                            class="underline text-sm text-red-600 dark:text-red-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Откажи') }}
                        </a>

                        <x-primary-button class="px-4 py-2">
                            {{ __('Креирај Резервација') }}
                        </x-primary-button>

                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>