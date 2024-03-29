@extends('layouts.app')

@section('titulo')
{{$post->titulo}}
@endsection

@section('contenido')
<div class="container mx-auto md:flex">
<div class="md:w-1/2">
   <img src="{{asset('uploads/').'/'.$post->imagen}}" alt="imagen del post {{$post->titulo}}">

   <div class="p-3 flex items-center gap-2">
    @auth

   {{-- <livewire:like-post/> --}}
@if ($post->checkLike(auth()->user()))
<form method="post" action="{{route('posts.likes.destroy', $post)}}">
        @csrf
        @method('DELETE')
        <div class="my-4">
            <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>
            </button>
</div>
    </form>
@else
<form method="post" action="{{route('posts.likes.store', $post)}}">
        @csrf
        <div class="my-4">
            <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>
            </button>
</div>
    </form>
@endif


    @endauth
    <p class="font-bold">{{$post->likes->count()}} <span class="font-normal">Likes</span></p>
   </div>
   <div class="">
    <p class="font-bold">{{$post->user->username}}</p>
    <p class="text-sm text-gray-500">
{{$post->created_at->diffForHumans()}}
    </p>
    <p class="mt-5">{{$post->descripcion}}</p>
   </div>
   @auth
   @if($post->user_id===auth()->user()->id)
       <form action="{{route('posts.destroy',$post)}}" method="post">
        @method('DELETE')
        @csrf
    <input type="submit" value="Eliminar Publicación" class="bg-red-500 px-5 py-2 rounded-lg text-white font-bold hover:bg-red-600 cursor-pointer uppercase
    ">
</form>
@endif
   @endauth


</div>

<div class="md:w-1/2 p-5">
    <div class="shadow bg-white p-5 mb-5 ">
        @auth
        <p class="text-xl font-bold text-center mb-4">Agrega un Nuevo Comentario</p>
@if (session('mensaje'))
    <p class="bg-green-500 p-2 uppercase rounded-lg mb-6 text-white text-center font-bold">{{session('mensaje')}}</p>
@endif
        <form action="{{route('comentarios.store', ['post'=>$post,'user'=>$user])}}" method="post">
            @csrf
            <div class="mb-5">
    <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">Añade un comentario</label>
    <textarea name="comentario" id="comentario" placeholder="Agrega un Comentario..." class="border p-3 w-full rounded-lg @error('comentario')
        border-red-500
    @enderror"
    > </textarea>
    @error('comentario')
        <p class="bg-red-500 py-2 px3 rounded-lg text-white text-center uppercase my-2 font-black">{{$message}}</p>
    @enderror
</div>
<input type="submit" value="Comentar" class="bg-sky-900 hover:bg-sky-700 py-2 px-5 cursor-pointer uppercase font-bold w-full text-white rounded-lg">
        </form>
            @endauth
            <div class="bg-gray-200 shadow mb-5 max-h-96 overflow-y-scroll">
@if ($post->comentarios->count())
@foreach ($post->comentarios as $comentario )
    <div class="p-5 border-gray-300 border-b text-center ">
        <p>{{$comentario->comentario}}</p>
        <div class="flex justify-between mt-2 items-center bg-white p-3 rounded-lg">
            <p class="text-right font-bold text-sm">{{$comentario->created_at->diffForHumans()}}</p>
        <a class="text-sm font-bold text-left hover:text-gray-400" href="{{route('posts.index',$comentario->user)}}">{{$comentario->user->username}}</a>
        </div>

    </div>
@endforeach
@else
    <p class="p-10 text-center">No Hay Comentarios Aún</p>
@endif
            </div>
    </div>
</div>

</div>
@endsection
