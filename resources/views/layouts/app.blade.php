<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title >Devstagram - @yield('titulo')</title>
@stack('styles')
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        <style>
            /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */
        </style>
    </head>
    <body class="bg-gray-300">
<header class="p-5 border-b bg-white shadow">

        <div class="container mx-auto flex justify-between items-center">

        <a href="{{route('home')}}" class="md:text-3xl font-black">Devstagram</a>

    @auth()
        <nav class="flex gap-2 items-center  ">
            <a href="{{route('posts.create')}}" class="flex items-center bg-gray-300 p-2 rounded-lg text-sm uppercase font-bold shadow cursor-pointer hover:bg-gray-400 gap-2 ">

                Crear
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
</svg>

            </a>
            <a class="font-bold  text-gray-600 text-sm" href="{{route('posts.index', auth()->user()->username)}}">Hola: <span class="font-normal ">{{auth()->user()->username}}</span> </a>
            <form method="post"  action="{{route('logout')}}">
                @csrf
            <button class="font-bold uppercase text-gray-600 text-sm" type="submit">Cerrar Sesión</button>
</form>
        </nav>
    @endauth

    @guest
        <nav class="flex gap-2 items-center">
            <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('login')}}">Login</a>
            <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('register')}}">Crear Cuenta</a>

        </nav>
    @endguest

        </div>



</header>
<main class="container mx-auto mt-10">
    <h2 class="font-black text-center text-3xl mb-10">@yield('titulo')</h2>

   @yield('contenido')
</main>
<footer class="text-center p-5 text-gray-500 font-bold uppercase mt-10 bg-white">
    Devstagram - Todos Los derechos reservados &copy; - {{now()->year}}
</footer>
    </body>

</html>
