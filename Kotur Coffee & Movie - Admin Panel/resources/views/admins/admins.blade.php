<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Админ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">

                @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
                @endif

                <!-- Create Admin Button (super-admin only) -->
                @if(Auth::check() && Auth::user()->role === 'super-admin')
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-bold">Сите Админи</h2>
                    <a href="{{ route('admin.create') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm font-semibold">
                        + Креирај Админ
                    </a>
                </div>
                @endif

                <!-- Admin Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto divide-y divide-gray-200">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">#</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Име Презиме</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Емаил</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Улога</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Креиран</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">Опции</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                            @foreach ($users as $user)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 text-sm">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-sm">{{ $user->name }}</td>
                                <td class="px-6 py-4 text-sm">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-sm">{{ $user->role }}</td>
                                <td class="px-6 py-4 text-sm">{{ $user->created_at->format('Y-m-d') }}</td>
                                <td class="px-6 py-4 text-sm space-x-2">
                                    <!-- Edit -->
                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900 font-medium">
                                        Измени
                                    </a>

                                    <!-- Delete -->
                                    {{-- only show “Delete” to super-admins --}}
                                    @if(auth()->user()->role === 'super-admin')
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                        class="inline-block ml-0"
                                        onsubmit="return confirm('Дали сте сигурен дека сакате да го избришите Админот?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-900 font-medium">
                                            Избриши
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>