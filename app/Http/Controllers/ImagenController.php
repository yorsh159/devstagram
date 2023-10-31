<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request){

       //return("Desde el controller Imagen");

       $imagen = $request->file('file');

       $nombre = Str::uuid() .".". $imagen->extension();

       $imagenServidor = Image::make($imagen);
       //$imagenServidor->fit(1000,1000,null,'center');
       
       $imagenPath = public_path('uploads').'/'. $nombre;
       $imagenServidor->save($imagenPath);
       
       return response()->json(['imagen'=>$nombre]);

    }
}
