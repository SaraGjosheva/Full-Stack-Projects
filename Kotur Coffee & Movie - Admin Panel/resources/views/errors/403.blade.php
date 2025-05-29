@extends('layouts.app')

@section('title', 'Пристап Одбиен')

@section('content')
<div class="text-center mt-10 text-red-600">
    <h1 class="text-4xl font-bold">403 | Забрането</h1>
    <p class="mt-4 text-xl">Само Супер-Админ може да регистрира нови корисници.</p>
    <a href="{{ url()->previous() }}" class="text-blue-500 underline mt-6 inline-block">
        {{ __('Врати се назад') }}
    </a>
</div>
@endsection