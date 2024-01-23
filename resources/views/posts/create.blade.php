@extends('layouts.app')

@section('titulo')
Crea una nueva Publicación
@endsection
@push('styles')
<link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
@endpush


@section('contenido')
<div class="md:flex md:items-center">
    <div class="md:w-1/2 px-10">
    <form action="{{route('imagenes.store')}}" method="post" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
    @csrf
</form>
    </div>
    {{-- ///////////////////////////////// --}}
    <div class="md:w-1/2 p-10 rounded-lg bg-white shadow mt-10 md:mt-0">
    <form action="{{route('posts.store')}}" method="POST">
    @csrf
<div class="mb-5">
    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Titulo del Post</label>
    <input type="text" name="titulo" id="titulo" placeholder="Escribe el titulo del post" class="border p-3 w-full rounded-lg @error('titulo')
        border-red-500
    @enderror"
    value="{{old('titulo')}}"
    >
    @error('titulo')
        <p class="bg-red-500 py-2 px3 rounded-lg text-white text-center uppercase my-2 font-black">{{$message}}</p>
    @enderror
</div>
<div class="mb-5">
    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripción</label>
    <textarea name="descripcion" id="descripcion" placeholder="Descripción de la publicación" class="border p-3 w-full rounded-lg @error('descripcion')
        border-red-500
    @enderror"
    > {{old('descripcion')}}</textarea>
    @error('descripcion')
        <p class="bg-red-500 py-2 px3 rounded-lg text-white text-center uppercase my-2 font-black">{{$message}}</p>
    @enderror
</div>
<div class="mb-5">
    <input type="hidden"
    name="imagen"
    value="{{old('imagen')}}"
    />
       @error('imagen')
        <p class="bg-red-500 py-2 px3 rounded-lg text-white text-center uppercase my-2 font-black">{{$message}}</p>
    @enderror
</div>
<input type="submit" value="Crear publicación" class="bg-sky-900 hover:bg-sky-700 py-2 px-5 cursor-pointer uppercase font-bold w-full text-white rounded-lg">
    </form>
    </div>
</div>
@endsection
