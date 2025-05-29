<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Избриши Админ потврда
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Дали сте сигурен дека сакате да го избришите Админот?</h3>

                    <div class="mb-4">
                        <p><strong>Име Презиме:</strong> {{ $user->name }}</p>
                        <p><strong>Емаил:</strong> {{ $user->email }}</p>
                        <p><strong>Улога:</strong> {{ $user->role }}</p>
                    </div>

                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="flex items-center">
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Да, избриши Админ
                            </button>
                            <a href="{{ route('admin.users.index') }}" class="ml-4 text-gray-600 hover:text-gray-900">
                                Откажи
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>