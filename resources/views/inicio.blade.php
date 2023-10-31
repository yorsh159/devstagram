@extends('layouts.app')

@section('titulo')
    
@endsection

@section('contenido')

<div class="grid justify-center">
@foreach ($posts as $post)
    <div class="bg-white max-w-fit p-5 mb-5 rounded-3xl">
        <div class="flex items-center gap-2 text-lg mb-2">
            <div class="w-10">
                <img src="{{ $post->user->imagen ? asset('perfiles').'/'.$post->user->imagen : asset('img/user.png')}}" alt="Imagen defecto" class="rounded-full"/>
            </div>  
            <p class="font-semibold cursor-pointer hover:text-gray-500">{{$post->user->usuario}}</p>
            <p class="text-xs text-slate-500">{{$post->created_at->diffForHumans()}}</p>
        </div>
        
        <div class="flex justify-center">
            <a href="{{route('post.show',['post'=>$post,'user'=>$post->user])}}">
                <img class="object-cover h-[400px] w-[550px]" src="{{asset('uploads').'/'.$post->imagen}}" alt="{{$post->imagen}}">
            </a>
        </div>   
        
        <div class="flex gap-2 text-lg">
            <p class="font-semibold cursor-pointer hover:text-gray-500">{{$post->user->usuario}}</p> {{$post->descripcion}}
        </div>

        @if ($post->likes->count())
            <div>
                <span class="text-sm font-semibold">{{$post->likes->count()}} Me Gusta</span>
            </div>
        @endif

        <div class="flex gap-4 mt-1">
            @if ($post->checkLike(auth()->user()))

            <form action={{route('post.like.eliminar',$post)}} method="POST">
                @method('DELETE')
                @csrf
                <button class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                </button>
            </form>
                
            @else
            
            <form action={{route('post.like.store',$post)}} method="POST">
                @csrf
                <button class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                </button>
            </form>

            @endif

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
            </svg>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
            </svg>
        </div>
            
    </div>
@endforeach
</div>
 
@endsection