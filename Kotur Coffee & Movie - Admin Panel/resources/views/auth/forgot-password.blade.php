<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Сте ја заборавиле вашата лозинка? Нема проблем. Само внесете ја вашата е-пошта и ќе ви испратиме линк за ресетирање на лозинката, преку кој ќе можете да изберете нова.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Eмаил')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <a class="underline text-sm text-blue-600 hover:text-red-900" href="{{ route('menu.index') }}">
                {{ __('Откажи') }}
            </a>

            <x-primary-button>
                {{ __('Ресетирај Лозинка') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>