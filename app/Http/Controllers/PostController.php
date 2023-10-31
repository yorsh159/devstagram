<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('show','index');
    }

    public function index(User $user){

        $posts = Post::where('user_id',$user->id)->latest()->get();
        
        //$posts = Post::where('user_id',$user->id)->paginate(3);

        //dd(auth()->user());
        return view('home',['user'=>$user,'posts'=>$posts]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){

        $this->validate($request,[
            'descripcion'=>'required',
            'imagen'=>'required'
        ]);

        // Post::create([
        //     'descripcion'=>$request->descripcion,
        //     'imagen'=>$request->imagen,
        //     'user_id'=>auth()->user()->id,
        // ]);

        $post = new Post();

        $post->descripcion = $request->descripcion;
        $post->imagen = $request->imagen;
        $post->user_id = auth()->user()->id;
        $post->save();

        // $request->user()->posts()->create([
        //     'descripcion'=>$request->descripcion,
        //     'imagen'=>$request->imagen,
        //     'user_id'=>auth()->user()->id,
        // ]);

        return redirect()->route('post.home',auth()->user()->usuario);
    }

    public function show(User $user,Post $post){

        return view('posts.show',['post'=>$post,'user'=>$user]);

    }

    public function destroy(Post $post){

       $this->authorize('delete',$post);
       $post->delete();

       $imagen_path = public_path('uploads/'.$post->imagen);

       if(File::exists($imagen_path)){
            unlink($imagen_path);
       }

       return redirect()->route('post.home',auth()->user()->usuario);
    }
}
