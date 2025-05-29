<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Измени Админ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">

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

                <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="mb-4">
                        <x-input-label for="name" :value="__('Име Презиме')" />
                        <x-text-input id="name" name="name" type="text"
                            class="block mt-1 w-full"
                            :value="old('name', $user->name)" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Е-пошта')" />
                        <x-text-input id="email" name="email" type="email"
                            class="block mt-1 w-full"
                            :value="old('email', $user->email)" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Role -->
                    <div class="mb-4">
                        <x-input-label for="role" :value="__('Улога')" />
                        <select id="role" name="role"
                            class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Админ</option>
                            <option value="super-admin" {{ old('role', $user->role) == 'super-admin' ? 'selected' : '' }}>Супер-Админ</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center justify-between mt-6">

                        <a href="{{ route('admin.users.index') }}"
                            class="underline text-sm text-red-600 dark:text-red-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Откажи') }}
                        </a>

                        <x-primary-button class="px-4 py-2">
                            {{ __('Измени Админ') }}
                        </x-primary-button>

                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>