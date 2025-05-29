@extends('layouts.app')

@section('new_discussion')

<div class="min-h-screen flex items-start justify-center bg-gray-100 py-12">
    <div class="w-full max-w-2xl bg-white p-8 rounded-lg shadow-md">
        <form action="{{ route('store.discussion') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm bg-white"
                    required>
            </div>

            <!-- Photo -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Photo</label>
                <input
                    type="file"
                    name="image"
                    id="image"
                    class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea
                    name="description"
                    id="description"
                    rows="5"
                    class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm bg-white"
                    required></textarea>
            </div>

            <!-- Category -->
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select
                    name="category"
                    id="category"
                    class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm bg-white"
                    required>
                    <option value="">Choose</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-between">

                <!-- Back Button -->
                <a href="{{ auth()->check() && auth()->user()->role_id === 1 ? route('admin.index') : route('index') }}"
                    class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md text-sm">
                    ← Back to Dashboard
                </a>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md text-sm shadow-md transition-all">
                    Submit
                </button>
            </div>

        </form>
    </div>
</div>

@endsection