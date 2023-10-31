<?php

namespace App\Livewire;

use App\Models\Like;
use Livewire\Component;

class LikePost extends Component
{
    public $post;

    public function like()
    {
        if($this->post->checkLike(auth()->user())){
            $this->post->likes()->where('post_id',$this->post->id)->delete();
        }else{
            
            $like = new Like;

            $like->user_id = auth()->user()->id;
            $like->post_id = $this->post->id;
            $like->save();
        }
    }

    public function render()
    {    
        return view('livewire.like-post');
    }
}
