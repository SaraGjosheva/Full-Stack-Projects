<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Резервации за Сала') }}
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

                <!-- Heading + Create Button -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-bold">Сите Резервации</h2>
                    <a href="{{ route('cinema.reservations.create') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm font-semibold">
                        + Креирај Резервација за Сала
                    </a>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto divide-y divide-gray-200">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">
                                    #</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">
                                    Име Презиме</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">
                                    Емаил</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">
                                    Тип на Настан</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">
                                    Порака</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">
                                    Датум</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">
                                    Час</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">
                                    Креирано</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">
                                    Опции</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                            @foreach ($reservations as $reservation)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 text-sm">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $reservation->full_name }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $reservation->email }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $reservation->event_type }}</td>
                                    <td class="px-6 py-4 text-sm break-words">
                                        {{ \Illuminate\Support\Str::limit($reservation->message, 50) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        {{ \Carbon\Carbon::parse($reservation->reservation_date)->format('Y-m-d') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm">{{ $reservation->reservation_hour }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        {{ \Carbon\Carbon::parse($reservation->created_at)->format('Y-m-d') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm space-x-2">
                                        <a href="{{ route('cinema.reservations.edit', $reservation->id) }}"
                                            class="text-blue-600 hover:text-blue-800 font-medium">Промени</a>

                                        <form action="{{ route('cinema.reservations.delete', $reservation->id) }}"
                                            method="POST" class="inline-block !ml-0"
                                            onsubmit="return confirm('Дали сте сигурни дека сакате да ја избришете оваа резервација?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium">
                                                Избриши
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $reservations->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
