@extends('layouts.app')

@section('content')

<section class="">
    <form class="grid grid-col-1 gap-3 lg:w-1/3 w-3/4 mx-auto my-64" action="{{route('login')}}" method="post">
        <div class=" border-red-400">
            <ul>
                @foreach($errors->all() as $error)
                <li class="bg-red-100  text-red-700 px-4 py-3 rounded">{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @csrf
        <label class="" for="email">Е-мејл</label>
        <input class="border rounded border-gray-300 py-1" type="email" name="email" id="email" value="{{old('email')}}">
        <label class="" for="password">Лозинка</label>
        <input class="border rounded border-gray-300 py-1" type="password" name="password" id="password">
        <button class="bg-yellow-500 rounded-md hover:bg-yellow-400  py-1 hover:text-white">Логирај се </button>
    </form>
</section>
@endsection