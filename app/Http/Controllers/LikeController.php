<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Post $post){

        // $post->likes()->create([
        //     'user_id'=>$request->user()->id
        // ]);        

        $like = new Like;

        $like->user_id = auth()->user()->id;
        $like->post_id = $post->id;
        $like->save();

        return back();

    }

    public function destroy(Request $request,Post $post){
        
        $request->user()->likes()->where('post_id',$post->id)->delete();        

        return back();
    }
}
