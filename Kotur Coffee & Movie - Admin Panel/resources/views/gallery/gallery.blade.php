<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Галерија
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">

                @if (session('success'))
                    <div class="bg-green-100 text-green-800 p-4 mb-4 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold mb-6">Слики од настанот: {{ $event->name }}</h3>
                    <a href="{{ route('gallery.add', $event->id) }}"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm font-semibold">
                        + Додади Слика
                    </a>
                </div>
                @if ($gallery->isEmpty() || $firstImage == null)
                    <div class="text-center">
                        <p class="text-gray-500">Нема фотографии во галеријата за овој настан.</p>
                    </div>

                @else
                    
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="w-full md:w-2/3 lg:w-2/3">
                        <div class="relative overflow-hidden rounded-xl shadow-lg">
                            <img id="main-image" src="{{ $firstImage->image }}" alt="Main Image"
                                class="w-full h-96 object-cover rounded-xl" />
                        </div>
                    </div>

                    <div class="w-full md:w-1/3 lg:w-1/3">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6">
                            @foreach ($gallery as $image)
                                <div class="relative group overflow-hidden rounded-xl shadow-lg">
                                    <img src="{{ $image->image }}" alt="Gallery Image"
                                        class="w-full h-48 object-cover rounded-xl cursor-pointer image-thumbnail"
                                        data-image="{{ $image->image }}" />

                                    <form action="{{ route('gallery.delete', $image->id) }}" method="POST"
                                        class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-600 text-white px-2 py-1 rounded-full hover:bg-red-700 focus:outline-none"
                                            name="delbtn">
                                            🗑️
                                        </button>
                                    </form>


                                </div>
                            @endforeach
                        </div>

                        @if ($gallery->hasPages())
                            <div class="mt-6 text-center">
                                {{ $gallery->links('pagination::tailwind') }}
                            </div>
                        @endif
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>

</x-app-layout>
