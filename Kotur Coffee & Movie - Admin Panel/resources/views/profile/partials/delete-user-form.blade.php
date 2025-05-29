<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Избриши Админ') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Откако ќе биде избришан вашиот профил, сите негови ресурси и податоци ќе бидат трајно избришани. Пред да го избришете профилот, ве молиме преземете ги сите податоци или информации што сакате да ги зачувате.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Избриши Админ') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Откако ќе го избришете вашиот профил, сите негови ресурси и податоци ќе бидат трајно избришани. Ве молиме внесете ја вашата лозинка за да потврдите дека сакате трајно да го избришете профилот.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Лозинка') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Откажи') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Избриши Админ') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>