<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{

    public function store(Request $request, User $user, Post $post)
    {

        //Validamos

        $this->validate($request, ['comentario' => 'required|max:300']);

        //alamcenamos el comentario

        Comentario::create([
            'user_id' => auth()->user()->id, 'post_id' => $post->id, 'comentario' => $request->comentario
        ]);

        return back()->with('mensaje', 'Comentario Realizado correctamente');
    }
}
