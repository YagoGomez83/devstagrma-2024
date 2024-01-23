@extends('layouts.app')


@section('titulo')
    Editar Perfil: {{auth()->user()->username}}
@endsection

@section('contenido')
<div class="md:flex md:justify-center">

<div class="md:w-1/2 bg-white shadow p-6">
    <form class="mt-10 md:mt-0" method="post" action="{{route('perfil.store')}}" enctype="multipart/form-data">
        @csrf
    <div class="mb-5">
     <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Usermane:</label>
     <input type="text" name="username" id="username" placeholder="Username" class="border p-3 w-full rounded-lg @error('username')
        border-red-500
      @enderror"
      value="{{auth()->user()->username}}"
     >
       @error('username')
        <p class="bg-red-500 py-2 px3 rounded-lg text-white text-center uppercase my-2 font-black">{{$message}}</p>
    @enderror
</div>

<div class="mb-5">
     <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">email:</label>
     <input type="email" name="email" id="email" placeholder="email" class="border p-3 w-full rounded-lg @error('email')
        border-red-500
      @enderror"
      value="{{auth()->user()->email}}"
     >
       @error('email')
        <p class="bg-red-500 py-2 px3 rounded-lg text-white text-center uppercase my-2 font-black">{{$message}}</p>
    @enderror
</div>

<div class="mb-5">
     <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña ANtigua:</label>
     <input type="password" name="password" id="password" placeholder="contraseña" class="border p-3 w-full rounded-lg @error('password')
        border-red-500
      @enderror"
      value=""
     >
     @error('password')
        <p class="bg-red-500 py-2 px3 rounded-lg text-white text-center uppercase my-2 font-black">{{$message}}</p>
    @enderror

</div>

<div class="mb-5">
     <label for="new_password" class="mb-2 block uppercase text-gray-500 font-bold">Repetir Contraseña Nueva:</label>
     <input type="password" name="new_password" id="new_password" placeholder="Nueva contraseña" class="border p-3 w-full rounded-lg @error('new_password')
        border-red-500
      @enderror"
      value=""
     >
 @error('new_password')
        <p class="bg-red-500 py-2 px3 rounded-lg text-white text-center uppercase my-2 font-black">{{$message}}</p>
    @enderror
</div>

<div class="mb-5">
     <label for="new_password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir contraseña:</label>
     <input type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="Repetir contraseña" class="border p-3 w-full rounded-lg @error('new_password_confirmation')
        border-red-500
      @enderror"
      value=""
     >
 @error('new_password_confirmation')
        <p class="bg-red-500 py-2 px3 rounded-lg text-white text-center uppercase my-2 font-black">{{$message}}</p>
    @enderror
</div>
{{-- /////////////////////////////////////////// --}}
<div class="mb-5">
    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Imagen Perfil:</label>
    <input type="file" name="imagen" id="imagen"
    class="border p-3 w-full rounded-lg "
    value=""
    accept=".jpg, jpeg, .gif, .png, .webp"
    >
</div>
@if (session('mensaje'))
         <p class="bg-red-500 py-2 px3 rounded-lg text-white text-center uppercase my-2 font-black">{{session('mensaje')}}</p>
    @endif
<input type="submit" value="Guardar Cambios" class="bg-sky-900 hover:bg-sky-700 py-2 px-5 cursor-pointer uppercase font-bold w-full text-white rounded-lg">
    </form>
    </div>
</div>
@endsection
