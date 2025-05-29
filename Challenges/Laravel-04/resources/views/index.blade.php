@extends('layouts.app')

@section('index_content')

<div class="min-h-screen bg-gray-100">

    <!-- Session Flash Messages -->
    <div class="max-w-4xl mx-auto pt-6">
        @if (session('message'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">{{ session('message') }}</div>
        @endif
        @if (session('update'))
        <div class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded mb-4">{{ session('update') }}</div>
        @endif
        @if (session('delete'))
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">{{ session('delete') }}</div>
        @endif
    </div>

    <!-- Welcome Header -->
    <header class="text-center py-8">
        <h1 class="text-3xl font-bold text-gray-800">Welcome to the Forum</h1>
    </header>

    <!-- Add New Discussion Button -->
    <div class="max-w-6xl mx-auto px-4 mb-8">
        <div class="flex justify-start">
            @auth
            <a href="{{ route('new.discussion') }}"
                class="bg-gray-700 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded">
                Add New Discussion
            </a>
            @else
            <a href="{{ route('login', ['redirect_message' => 'You have to be logged in to do that!']) }}"
                class="bg-gray-700 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded">
                Add New Discussion
            </a>
            @endauth

        </div>
    </div>


    @endsection