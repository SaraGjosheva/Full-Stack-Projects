@extends('layouts.app')


@section('admin_content')


<section id="main" class="p-5">

  <div class=" flex md:w-3/4 mx-auto  ">
    <button id="add_project" class="pt-2 px-2 border-b-2 borderAdd text-blue-600 font-bold">Додади</button>
    <button id="change_project" class=" pt-2 px-2 border-b-2 text-blue-600 font-bold">Измени</button>
    <div class="border-b-2 w-3/4"></div>
  </div>

  <!-- Dodati section  -->
  <div id="add_section" class="md:w-3/4 mx-auto mb-5">
    <h3 class="text-2xl mt-3 mb-4 font-bold">Додади нов производ:</h3>

    {{-- Success message at the top --}}
    @if(session()->has('success'))
    <div class="bg-teal-100 rounded text-teal-900 px-4 py-3 shadow-md mb-4" role="alert">
      {{ session('success') }}
    </div>
    @endif

    <form class="grid grid-col-1 gap-3 md:w-3/4 mx-auto" method="POST" action="{{ route('store') }}">
      @csrf

      {{-- Product Name --}}
      <label for="product_name">Име</label>
      <input
        class="border rounded border-gray-300 p-1"
        type="text"
        name="product_name"
        id="product_name"
        value="{{ old('product_name') }}">
      @error('product_name')
      <div class="text-red-600 text-sm mb-3">{{ $message }}</div>
      @enderror

      {{-- Product Header --}}
      <label for="product_header">Поднаслов</label>
      <input
        class="border rounded border-gray-300 p-1"
        type="text"
        name="product_header"
        id="product_header"
        value="{{ old('product_header') }}">
      @error('product_header')
      <div class="text-red-600 text-sm mb-3">{{ $message }}</div>
      @enderror

      {{-- Product Image --}}
      <label for="product_img">Слика</label>
      <input
        class="border rounded border-gray-300 p-1"
        type="text"
        name="product_img"
        id="product_img"
        placeholder="http://"
        value="{{ old('product_img') }}">
      @error('product_img')
      <div class="text-red-600 text-sm mb-3">{{ $message }}</div>
      @enderror

      {{-- Product URL --}}
      <label for="product_url">URL</label>
      <input
        class="border rounded border-gray-300 p-1"
        type="text"
        name="product_url"
        id="product_url"
        placeholder="http://"
        value="{{ old('product_url') }}">
      @error('product_url')
      <div class="text-red-600 text-sm mb-3">{{ $message }}</div>
      @enderror

      {{-- Product Description --}}
      <label for="product_desc">Опис</label>
      <textarea
        class="border rounded border-gray-300 p-1"
        name="product_desc"
        id="product_desc"
        cols="30"
        rows="3">{{ old('product_desc') }}</textarea>
      @error('product_desc')
      <div class="text-red-600 text-sm mb-3">{{ $message }}</div>
      @enderror

      <button class="bg-yellow-500 rounded-md hover:bg-yellow-400 py-1 hover:text-white">
        Додај
      </button>
    </form>
  </div>

  <!-- izmeni section -->

  <div id="change_section" class="my-10 grid hidden lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4 mx-auto w-4/5 ">

    @foreach($projects as $project)
    <div class="card  ">
      <div class="mx-auto   max-w-sm rounded overflow-hidden shadow-lg hover:border hover:border-yellow-500">
        <div class="form hidden">
          <form class="grid grid-col-1 gap-3  " action="{{route('update')}}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="product_id" id="product_id" value="{{$project->id}}" hidden>
            <label class="" for="product_name">Име</label>
            <input class="border rounded border-gray-300 p-1" type="text" name="product_name" id="product_name" value="{{$project->name}}">
            <label class="" for="product_header">Поднаслов</label>
            <input class="border rounded border-gray-300 p-1" type="text" name="product_header" id="product_header" value="{{$project->subtitle}}">
            <label class="" for="product_img">Слика</label>
            <input class="border rounded border-gray-300 p-1" type="text" name="product_img" id="product_img" placeholder="http://" value="{{$project->image }}">
            <label class="" for="product_url">URL</label>
            <input class="border rounded border-gray-300 p-1" type="text" name="product_url" id="product_url" placeholder="http://" value="{{$project->url}}">
            <label class="" for="product_desc">Опис</label>
            <textarea class="border rounded border-gray-300 py-1" name="product_desc" id="product_desc" cols="30" rows="3" value="">{{$project->desc}}</textarea>

            <div class="  px-6 pt-4 bg-gray-300 pb-2 text-center">
              <button type="submit" id="store" class="px-5 py-1 border rounded-lx hover:bg-gray-500">Зачувај</button>
              <a class="close_edit px-5 py-1 border rounded-lx hover:bg-gray-500">Откажи</a>
            </div>
          </form>
        </div>
        <div class="card_info ">
          <img class="w-full" src="{{$project->image }}" alt="Sunset in the mountains">
          <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{$project->name}}</div>
            <h3 class="font-bold text-xl">{{$project->subtitle}}</h3>
            <p class="text-gray-700 text-base">
              {{$project->desc}}
            </p>
          </div>
          <div class="edit hidden px-6 pt-4  bg-gray-300 pb-2 text-center">
            <button class="edit_card px-5 py-1 border rounded-lx hover:bg-gray-500"><i class="fa-solid fa-pen-to-square"></i></button>
            <button class="open_modal delete_card px-5 py-1 border rounded-lx hover:bg-gray-500"><i class="fa-solid fa-trash"></i></button>
          </div>
        </div>
      </div>
    </div>

    @endforeach
  </div>

</section>

<div class="flex justify-center items-center  bg-gray-100">


  <!-- Modal container -->
  <div id="modal" class="fixed inset-0 z-10 hidden  overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen">
      <!-- Modal overlay -->
      <div class="fixed inset-0 bg-black opacity-50"></div>

      <!-- Modal content -->
      <div class="bg-white relative  rounded shadow-lg p-6 z-20">

        <!-- Modal content -->
        <div class="py-2 border-b-2">
          <h1 class="text-2xl mb-4">Избриши</h1>
        </div>
        <div class="py-3 border-b-2">
          <p class="font-bold text-black text-sm">Дали сте сигурни дека сакате да го избришете производот?</p>
        </div>
        <div class="flex justify-end items-center">
          <a class="bg-gray-500 rounded hover:bg-gray-400 text-white  px-2 close_modal  hover:text-black" href="">Откажи</a>
          <form action="{{ route('destroy',$project->id) }}" method="POST" class="grid grid-col-1 gap-3 p-2 ">
            @csrf
            @method('delete')
            <button class="bg-yellow-500 rounded hover:bg-yellow-400 px-2 hover:text-white">Избриши</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection