@extends('layouts.app')

@section('contenido')

<div class="md:flex gap-1">

    <div class="md:w-1/2 p-10 bg-white rounded-xl shadow-xl mt-5 md:mt-0">
        <div class="flex justify-center">
            <img class="object-contain h-[480px]" src="{{ asset('uploads').'/'.$post->imagen}}" alt="Imagen del post {{$post->user_id}}">             
        </div>

        @auth
        @if ($post->user_id === auth()->user()->id)
        <div>
            <form action={{route('post.eliminar',$post)}} method='POST'>
                @method('DELETE')
                @csrf
                <button class="bg-red-500 rounded-md p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </button>
            </form>
        </div>
        @endif
        @endauth
           
    </div>
    
    <div class="md:w-1/2 p-3 bg-white rounded-xl shadow-xl mt-10 md:mt-0">
        <div>
            <div class="flex gap-2 text-lg">
                <p class="font-semibold cursor-pointer hover:text-gray-500">{{$post->user->usuario}}</p> {{$post->descripcion}}
            </div>
            <p class="text-xs text-slate-500">{{$post->created_at->diffForHumans()}}</p>
        </div>

        @if ($post->likes->count())
            <div>
                <span class="text-sm font-semibold">{{$post->likes->count()}} Me Gusta</span>
            </div>
        @endif

        <div class="flex gap-4 mt-1">
            @auth

            <livewire:like-post :post="$post" />

            @if ($post->checkLike(auth()->user()))

            <form action={{route('post.like.eliminar',$post)}} method="POST">
                @method('DELETE')
                @csrf
                
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

            @endauth            
        
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
            </svg>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
            </svg>
        </div>

        <div class=" overflow-y-scroll max-h-80">
            @if ($post->comentarios->count())
                @foreach ($post->comentarios as $comentario)
                <div class="flex gap-2">
                    <a href={{ route('post.home', $comentario->user) }} class="font-semibold">{{$comentario->user->usuario}}</a>
                    <p>{{$comentario->comentario}}</p>
                </div>
                <div class="flex gap-2">
                    <p class="text-xs text-gray-500">{{$comentario->created_at->diffForHumans()}}</p>
                    @auth
                        @if ($comentario->user->id === auth()->user()->id)
                        <p class="text-xs text-gray-500">Eliminar</p>
                        @endif
                    @endauth
                </div> 
                @endforeach
            @else
                <p> No exiten comentarios aún </p>
            @endif
        </div>
        
        @auth
        <form action={{route('comentarios.store',['post'=>$post,'user'=>$user])}} method="POST">
            @csrf
            <div class="p-2">
                <label for="comentario">Comentarios</label>
                <textarea id="comentario" name="comentario" placeholder="Escribe un comentario..." class="rounded-lg border-2 w-full resize-none"></textarea>
                
                @error('comentario')
                <div class="flex items-center font-semibold text-sm rounded-md text-red-500/75 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                    </svg>                      
                    <span>{{$message}}</span>
                </div>
                @enderror
            </div>
    
            {{-- <input type="submit" value="Publicar" class="rounded-md bg-slate-950 hover:bg-slate-700 text-white font-semibold p-3"/> --}}

            <button class="rounded-md bg-slate-950 hover:bg-slate-700 text-white font-semibold p-3">
                Publicar  
            </button>
        </form>
        
        @endauth
        
    </div>
    

</div>
        
@endsection