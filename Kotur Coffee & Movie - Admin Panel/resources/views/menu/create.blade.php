<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Креирај Мени Продукт') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-lg font-bold mb-5 mt-3">Додади Мени Продукт</h2>

                @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('menu.store') }}" method="POST">
                    @csrf

                    <!-- Name -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Име на продукт</label>
                        <input type="text" name="name" id="name"
                            class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                    </div>

                    <!-- Category -->
                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Категорија</label>
                        <select name="category" id="category"
                            class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                            <option value="Коктели">Коктели</option>
                            <option value="Кафе">Кафе</option>
                            <option value="Мезе">Мезе</option>
                        </select>
                    </div>

                    <!-- Ingredients -->
                    <div class="mb-4">
                        <label for="ingredients" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Состојки</label>
                        <textarea name="ingredients" id="ingredients" rows="3"
                            class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            required></textarea>
                    </div>

                    <!-- Image -->
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Слика URL</label>
                        <input type="text" name="image" id="image"
                            class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                    </div>

                    <!-- Checkboxes -->
                    <div class="flex items-center mb-3">
                        <input type="checkbox" name="is_recommended" id="is_recommended" class="text-indigo-600 rounded focus:ring-indigo-500">
                        <label for="is_recommended" class="ml-2 text-sm text-gray-700 dark:text-gray-300">Препорачано</label>
                    </div>

                    <div class="flex items-center mb-6">
                        <input type="checkbox" name="is_popular" id="is_popular" class="text-indigo-600 rounded focus:ring-indigo-500">
                        <label for="is_popular" class="ml-2 text-sm text-gray-700 dark:text-gray-300">Популарно</label>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-between mt-6">

                        <a class="underline text-sm text-red-600 dark:text-red-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('menu.index') }}">
                            {{ __('Откажи') }}
                        </a>

                        <x-primary-button class="mr-4 p-3">
                            {{ __('Додади') }}
                        </x-primary-button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>