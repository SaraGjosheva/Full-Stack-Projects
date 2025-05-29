<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Апликации за Работа') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">

                <!-- Header / Section title -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-bold">Сите Апликации</h2>
                </div>

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

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
                                    Телефон</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">
                                    Емаил</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">
                                    Позиција</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">
                                    CV</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">
                                    Креиран</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase">
                                    Опции</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                            @foreach ($applications as $application)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 text-sm">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $application->full_name }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $application->phone_number }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $application->email }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $application->position }}</td>
                                    <td class="px-6 py-4 text-sm break-words">
                                        <a href="{{ asset($application->cv_path) }}" target="_blank"
                                            class="text-blue-600 hover:text-blue-800 block">
                                            Погледни CV
                                        </a>
                                        <a href="{{ asset($application->cv_path) }}" download
                                            class="text-green-600 hover:text-green-800 block">
                                            Превземи CV
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        {{ \Carbon\Carbon::parse($application->created_at)->format('Y-m-d') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm space-y-2">
                                        <!-- Review Toggle -->
                                        <form action="{{ route('job.application.toggleReview', $application->id) }}"
                                            method="POST" class="inline-block mr-1">
                                            @csrf
                                            <button type="submit"
                                                class="text-green-600 hover:text-green-800 font-medium">
                                                {{ $application->reviewed ? 'Не прегледан' : 'Прегледан' }}
                                            </button>
                                        </form>

                                        <!-- Decline Form -->
                                        <form action="{{ route('job.application.delete', $application->id) }}"
                                            method="POST" class="inline-block ml-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium"
                                                onclick="return confirm('Дали си сигурен/сигурна дека сакаш да ја одбиеш оваа апликација?');">
                                                Одбиј аппликација
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
                    {{ $applications->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
