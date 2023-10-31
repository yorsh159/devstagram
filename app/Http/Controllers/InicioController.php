<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function __invoke(){

        $ids=auth()->user()->followings->pluck('id')->toArray();

        $post = Post::whereIn('user_id',$ids)->orderBy('created_at','desc')->get();

        //dd($post);

        return view('inicio',['posts'=>$post]);
    }

}
