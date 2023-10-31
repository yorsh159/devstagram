<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function index() 
    {
        //dd('Este es el registro');
        return view('auth.registro');
    }

    public function store(Request $request)
    {
        //dd($request);

        $this->validate($request,[
            'nombre' => 'required|max:100',
            'usuario' => 'required|max:50|unique:users,usuario',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ],

        );


        $usuario = new User();
        $usuario->nombre = $request->nombre;
        $usuario->usuario = Str::slug($request->usuario);
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $usuario->save();

        /* Otra forma de insert 
        User::create([
           'nombre' => $request->nombre,
           'usuario'=> $request->usuario,
           'email'=> $request->email,
           'password'=>Hash::make($request->password),
        ]);
        */
        
        //Auntenticar al usuario (solo funciona con email)

        auth()->attempt([
            'email'=> $request->email,
            'password'=>$request->password,
        ]);

        //auth()->attempt($request->only('usuario','password'));

        return redirect()->route('info');
    }
}
