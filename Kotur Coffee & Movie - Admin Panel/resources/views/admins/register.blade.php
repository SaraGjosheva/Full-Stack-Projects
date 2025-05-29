@php
use App\Models\User;
$hasSuperAdmin = User::where('role', 'super-admin')->exists();
@endphp

<x-guest-layout>
    <form method="POST" action="{{ route('admin.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Име Презиме')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-3" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Емаил')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-3" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Лозинка')" />

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-3" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Потврди Лозинка')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-3" />
        </div>

        <!-- Generate Password Button -->
        <div class="mt-4">
            <x-input-label for="generatePassword" :value="__('Генерирај Лозинка')" />

            <x-primary-button class="mt-2" id="generatePassword">
                {{ __('Генерирај Лозинка') }}
            </x-primary-button>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-3" />

        </div>

        <!-- Role -->
        <div class="my-4 mb-5">
            <x-input-label for="role" :value="__('Улога')" />
            <select id="role" name="role"
                class="block mt-1 w-full bg-gray-800 text-white border-gray-600 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required>

                @if (!$hasSuperAdmin)
                <option value="super-admin">Супер-Админ</option>
                @elseif(auth()->check() && auth()->user()->role === 'super-admin')
                <option value="admin">Админ</option>
                <option value="super-admin">Супер-Админ</option>
                @else
                <option disabled selected>Нема достапни улоги</option>
                @endif

            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-3" />
        </div>

        <div class="flex items-center justify-between mt-6">

            <a class="underline text-sm text-red-600 dark:text-red-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('admin.users.index') }}">
                {{ __('Откажи') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Регистрирај Админ') }}
            </x-primary-button>

        </div>
    </form>
</x-guest-layout>