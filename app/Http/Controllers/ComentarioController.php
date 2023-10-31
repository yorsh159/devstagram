<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request,User $user,Post $post){

        //dd(auth()->user()->id);

        $this->validate($request,[
            'comentario'=>'required|max:500'
        ]);

        $comentario = new Comentario;

        $comentario->user_id = auth()->user()->id;
        $comentario->post_id = $post->id;
        $comentario->comentario = $request->comentario;
        
        //dd($comentario);

        $comentario->save();

        return back();

    }
}
