@extends('layouts.app')

@section('content')



<main id="main" class="flex justify-center items-center">

    <div class=" mx-auto md:w-1/4 w-3/4 text-center text-white">
        <h1 class="md:text-5xl text-4xl ">Brainster.xyz Labs</h1>
        <p class=" mt-5 opacity-80 md:text-l ">Пpоекти од акaдемиите на Brainster</p>
    </div>
</main>

<section>
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mx-auto w-1/2 my-5" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="my-10 grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4 mx-auto w-4/5 ">

        @foreach($projects as $project)

        <div class="mx-auto max-w-sm rounded overflow-hidden shadow-lg hover:border hover:border-yellow-500">
            <img class="w-full" src="{{ $project->image }}" alt="Project image">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ $project->name }}</div>
                <h3 class="font-bold text-xl text-center">{{ $project->subtitle }}</h3>
                <p class="text-gray-700 text-base">
                    {{ $project->desc }}
                </p>
            </div>
            <div class="px-6 pt-4 pb-4 flex justify-center">
                <a href="{{ $project->url }}"
                    class="inline-block bg-gray-200 hover:bg-gray-300 rounded-full px-4 py-2 text-sm font-semibold text-gray-700 transition">
                    {{ $project->subtitle }}
                </a>
            </div>
        </div>
        @endforeach
    </div>

</section>

<div id="modal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-black bg-opacity-50">
    <div class="flex items-center justify-center min-h-screen px-4">
        <!-- Modal box -->
        <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-lg p-6">
            <!-- Close button -->
            <button id="close_modal" type="button"
                class="absolute -top-3 -right-3 bg-gray-100 hover:bg-gray-200 text-gray-700 hover:text-black rounded-full p-2 shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Modal header -->
            <div class="border-b pb-3 mb-4">
                <h2 class="text-2xl font-semibold text-gray-800">Вработи наши студенти</h2>
                <p class="text-sm text-gray-500 mt-1">Внесете Ваши информации за да стапиме во контакт</p>
            </div>

            <!-- Modal body/form -->
            <form action="{{ route('send') }}" method="post" class="space-y-4">
                @csrf
                <div>
                    <label for="company_email" class="block text-sm font-medium text-gray-700">Е-мејл</label>
                    <input type="email" id="company_email" name="company_email"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                </div>

                <div>
                    <label for="company_phone" class="block text-sm font-medium text-gray-700">Телефон</label>
                    <input type="tel" id="company_phone" name="company_phone"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                </div>

                <div>
                    <label for="company_name" class="block text-sm font-medium text-gray-700">Компанија</label>
                    <input type="text" id="company_name" name="company_name"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                </div>

                <div class="text-right">
                    <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-400 text-white font-semibold py-2 px-4 rounded-md transition">
                        Испрати
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection