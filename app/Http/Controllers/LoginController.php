<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6|max:30|'
        ]);


        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            //Coloca el mensaje en una sesión
            return back()->with('mensaje', 'credenciales incorrectas');
        }

        return redirect()->route('posts.index', ['user' => auth()->user()->username]);
    }
}
