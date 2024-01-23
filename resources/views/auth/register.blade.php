@extends('layouts.app')

@section('titulo')
Registrate en Devstagram
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-4 md:items-center">

    <div class="md:w-6/12 p-5">
        <img src="{{asset('img/registrar.jpg')}}" alt="Imagen registro">
</div>

<div class="md:w-4/12 p-6 rounded-lg bg-white shadow">
<form action="{{'register'}}" method="POST">
    @csrf
<div class="mb-5">
    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre:</label>
    <input type="text" name="name" id="name" placeholder="Tu nombre" class="border p-3 w-full rounded-lg @error('name')
        border-red-500
    @enderror"
    value="{{old('name')}}"
    >
    @error('name')
        <p class="bg-red-500 py-2 px3 rounded-lg text-white text-center uppercase my-2 font-black">{{$message}}</p>
    @enderror
</div>
<div class="mb-5">
    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Usename:</label>
    <input type="text" name="username" id="username" placeholder="Tu nombre de usuario" class="border p-3 w-full rounded-lg  @error('username')
        border-red-500
    @enderror"
    value="{{old('username')}}"
    >
    @error('username')
        <p class="bg-red-500 py-2 px3 rounded-lg text-white text-center uppercase my-2 font-black">{{$message}}</p>
    @enderror
</div>
<div class="mb-5">
    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">E-mail:</label>
    <input type="text" name="email" id="email" placeholder="Tu correo" class="border p-3 w-full rounded-lg  @error('email')
        border-red-500
    @enderror" value="{{old('email')}}">
    @error('email')
        <p class="bg-red-500 py-2 px3 rounded-lg text-white text-center uppercase my-2 font-black">{{$message}}</p>
    @enderror
</div>
<div class="mb-5">
    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña:</label>
    <input type="password" name="password" id="password" placeholder="Tu contraseña" class="border p-3 w-full rounded-lg  @error('password')
        border-red-500
    @enderror">
    @error('password')
        <p class="bg-red-500 py-2 px3 rounded-lg text-white text-center uppercase my-2 font-black">{{$message}}</p>
    @enderror
</div>
<div class="mb-5">
    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir contraseña:</label>
    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repite tu contraseña" class="border p-3 w-full rounded-lg">
</div>
<input type="submit" value="Crear cuenta" class="bg-sky-900 hover:bg-sky-700 py-2 px-5 cursor-pointer uppercase font-bold w-full text-white rounded-lg">
</form>
</div>

@endsection

