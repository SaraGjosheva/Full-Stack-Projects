<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Контролна Табла') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Настани -->
                <a href="/events" class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Настани</h3>
                    <p class="mt-2 text-3xl font-bold text-indigo-600">{{ $eventCount }}</p>
                </a>

                <!-- Мени Продукти -->
                <a href="/menu" class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Мени Продукти</h3>
                    <p class="mt-2 text-3xl font-bold text-green-600">{{ $menuCount }}</p>
                </a>

                <!-- Резервации за Сала -->
                <a href="/cinema-reservation" class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Сала Резервации</h3>
                    <p class="mt-2 text-3xl font-bold text-purple-600">{{ $cinemaCount }}</p>
                </a>

                <!-- Резервации за Коктели -->
                <a href="/cocktail-reservation" class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Коктел Резервации</h3>
                    <p class="mt-2 text-3xl font-bold text-pink-600">{{ $cocktailCount }}</p>
                </a>

                <!-- Апликации за Работа -->
                <a href="/job-applications" class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Апликации за Работа</h3>
                    <p class="mt-2 text-3xl font-bold text-yellow-600">{{ $jobAppCount }}</p>
                </a>

                <!-- Admins -->
                <a href="/admins" class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Админи</h3>
                    <p class="mt-2 text-3xl font-bold text-blue-600">{{ $adminCount }}</p>
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
