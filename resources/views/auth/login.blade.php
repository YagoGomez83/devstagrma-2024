@extends('layouts.app')

@section('titulo')
Inicia Sesión en Devstagram
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-4 md:items-center">

    <div class="md:w-6/12 p-5">
        <img src="{{asset('img/login.jpg')}}" alt="Imagen login de usuario">
</div>

<div class="md:w-4/12 p-6 rounded-lg bg-white shadow">
<form action="{{route('login')}}" method="post">
    @csrf
    @if (session('mensaje'))
         <p class="bg-red-500 py-2 px3 rounded-lg text-white text-center uppercase my-2 font-black">{{session('mensaje')}}</p>
    @endif

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
     <input type="checkbox" class="" name="remember" id="recordar">
    <label for="recordar" class=" text-gray-500  text-sm">Mantener mi sesión abierta</label>
</div>


<input type="submit" value="Iniciar Sesión" class="bg-sky-900 hover:bg-sky-700 py-2 px-5 cursor-pointer uppercase font-bold w-full text-white rounded-lg">
</form>
</div>

@endsection

