<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('perfil.editar');
    }

    public function store(Request $request){
        
        $request->request->add(['usuario'=>Str::slug($request->usuario)]);

        $this->validate($request,[
            'usuario' => ['required',
            'min:5',
            'max:50',
            'unique:users,usuario,'.auth()->user()->id,
            'not_in:editar-perfil,post,register,registrar,login' ],
            'email' => ['required','email','unique:users,email,'.auth()->user()->id],
        ]);

        if($request->old_password ){
            $this->validate($request,[
                'password' => 'min:8'
            ]);

            if(Hash::check($request->old_password, auth()->user()->password)){
                $new_password = $request->password;
                //dd($new_password);
                
            }else{
                return back()->with('mensaje','Contraseña Actual Incorrecta');
            }
        }

        if($request->imagen){
            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() .".". $imagen->extension();

            $imagenServidor = Image::make($imagen);
            //$imagenServidor->fit(1000,1000,null,'center');
       
            $imagenPath = public_path('perfiles').'/'. $nombreImagen;
            $imagenServidor->save($imagenPath);
        }

        $usuario = User::find(auth()->user()->id);
        $usuario->usuario = $request->usuario;
        $usuario->email = $request->email;
        $usuario->password = $new_password ?? auth()->user()->password; 
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? '';
        $usuario->save();

        return redirect()->route('post.home',$usuario->usuario);
    }
}
