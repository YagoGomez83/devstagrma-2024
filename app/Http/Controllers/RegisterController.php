<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    function index()
    {
        return view('auth.register');
    }

    function store(Request $request)
    {

        //Modificamos el request

        $request->request->add(['username' => Str::slug($request->username)]);
        // dd($request->get('name'));

        //validación

        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|min:6|max:30|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);

        //Autenticar el usuario

        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);


        return redirect()->route('posts.index');
    }
}
