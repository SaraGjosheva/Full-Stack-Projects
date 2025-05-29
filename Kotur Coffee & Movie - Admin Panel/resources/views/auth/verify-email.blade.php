<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Ти благодариме што се регистрираше! Пред да започнеш, те молиме потврди ја твојата е-пошта со кликнување на линкот што ти го испративме. Ако не ја доби пораката, со задоволство ќе ти испратиме нова.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
        {{ __('Нов линк за верификација е испратен на е-поштата што ја внесовте при регистрацијата.') }}
    </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Испрати повторно емаил за верификација') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Одјави се') }}
            </button>
        </form>
    </div>
</x-guest-layout>