@extends('layouts.master')

@section('title', 'Information')

@section('content')

<div class="container my-5 text-light">
    <div class="col-12 col-md-6 offset-md-3 spacing-2">
        @if (session('name'))
        <h4 class="mb-3">Your name is: {{ session('name') }}</h4>
        @endif

        @if (session('surname'))
        <h4 class="mb-3">Your last name is: {{ session('surname') }}</h4>
        @endif

        @if (session('email'))
        <h4 class="mb-3">Your email is: {{ session('email') }}</h4>
        @endif
    </div>


</div>

@endsection