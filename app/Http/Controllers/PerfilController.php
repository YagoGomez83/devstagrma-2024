<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {

        $request->request->add(['username' => Str::slug($request->username)]);
        $this->validate(
            $request,
            [
                'username' => ['required', 'unique:users,username,' . auth()->user()->id, 'min:3', 'max:20',],
                'email' => ['required', 'email', 'sometimes', 'unique:users,email,' . auth()->user()->id,]
            ],
        );



        if ($request->imagen) {
            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            $manager = new ImageManager(new Driver());
            $imagenServidor = $manager::imagick()->read($imagen);
            $imagenServidor->resizeDown(1000, 1000);
            $imagenPath = public_path('perfiles') . "/" . $nombreImagen;
            $imagenServidor->toPng()->save($imagenPath);
        }


        //Guardar Cambios
        $usuario = User::find(auth()->user()->id);





        if ($request->password || $request->new_password) {

            $this->validate($request, [
                'password' => 'required|min:6',
                'new_password' => 'required|confirmed|min:6'
            ]);

            if (Hash::check($request->password, $usuario->password)) {

                $usuario->password = Hash::make($request->new_password);
                $usuario->save();
            } else {

                return back()->with('mensaje', 'El password antiguo no coincide.');
            }
        }

        $usuario->username = $request->username;

        $usuario->email = $request->email;



        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? '';
        //redireccionar
        $usuario->save();
        return redirect()->route('posts.index', $usuario->username);
    }
}
