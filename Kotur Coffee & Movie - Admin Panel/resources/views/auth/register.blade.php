@php
use App\Models\User;
$hasSuperAdmin = User::where('role', 'super-admin')->exists();
@endphp

<x-guest-layout>
    @if (! $hasSuperAdmin)
    {{-- 1) First-ever super-admin --}}
    <div class="text-center text-xl font-semibold my-6">
        {{ __('Креирај прв Супер-Админ') }}
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Name --}}
        <div>
            <x-input-label for="name" :value="__('Име Презиме')" />
            <x-text-input
                id="name"
                class="block mt-1 w-full"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Email --}}
        <div class="mt-4">
            <x-input-label for="email" :value="__('Емаил')" />
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Password --}}
        <div class="mt-4">
            <x-input-label for="password" :value="__('Лозинка')" />
            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Confirm Password --}}
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Потврди Лозинка')" />
            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        {{-- Force role = super-admin --}}
        <input type="hidden" name="role" value="super-admin" />

        {{-- Submit --}}
        <div class="flex items-center justify-center mt-6">
            <x-primary-button>
                {{ __('Креирај Супер-Админ') }}
            </x-primary-button>
        </div>
    </form>

    @else
    {{-- 2) Super-admin already exists --}}
    @auth
    @if (auth()->user()->role === 'super-admin')
    {{-- Show form to create a regular admin --}}
    <div class="text-center text-xl font-semibold my-6">
        {{ __('Креирај Нов Админ') }}
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Name --}}
        <div>
            <x-input-label for="name" :value="__('Име Презиме')" />
            <x-text-input
                id="name"
                class="block mt-1 w-full"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Email --}}
        <div class="mt-4">
            <x-input-label for="email" :value="__('Емаил')" />
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Password --}}
        <div class="mt-4">
            <x-input-label for="password" :value="__('Лозинка')" />
            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Confirm Password --}}
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Потврди Лозинка')" />
            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        {{-- Force role = admin --}}
        <input type="hidden" name="role" value="admin" />

        {{-- Submit --}}
        <div class="flex items-center justify-center mt-6">
            <x-primary-button>
                {{ __('Креирај Админ') }}
            </x-primary-button>
        </div>
    </form>

    @else
    {{-- Logged in but not super-admin --}}
    <div class="p-6 text-red-600 text-center">
        {{ __('Немате овластување да креирате админи.') }}
    </div>
    <div class="flex justify-center mt-4">
        <a
            href="{{ route('dashboard') }}"
            class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
            {{ __('Назад') }}
        </a>
    </div>
    @endif
    @else
    {{-- Guest after first super-admin exists --}}
    <div class="p-6 text-red-600 text-center">
        {{ __('Само Супер-Админ може да креира нови админи. Ве молиме логирајте се.') }}
    </div>
    <div class="flex justify-center mt-4">
        <a
            href="{{ route('login') }}"
            class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
            {{ __('Логирај се') }}
        </a>
    </div>
    @endauth
    @endif
</x-guest-layout>