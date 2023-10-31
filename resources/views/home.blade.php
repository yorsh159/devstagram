@extends('layouts.app')

@section('contenido')

    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-1/2 md:flex items-center justify-center">
            <div class="flex w-56">
                <img src="{{ $user->imagen ? asset('perfiles').'/'.$user->imagen : asset('img/user.png')}}" alt="Imagen defecto" class="rounded-full"/>
            </div>
            <div class="w-80 p-5 flex flex-col items-center md:justify-center">
                
                <div class="flex items-center gap-3 p-2">
                    <p class="flex items-center text-gray-700 text-2xl font-semibold" >{{$user->nombre}}</p>
                    @auth
                        @if (auth()->user()->id === $user->id)
                            <a href={{route('perfil.index',auth()->user()->usuario)}} class="hover:text-gray-700 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </a>
                        @endif    
                    @endauth
                    
                      
                </div>
    
                <div class="flex items-center gap-3 justify-center">
                    <p class="text-gray-800 text-sm mb-3 font-bold ">
                        {{$user->followings->count()}}
                        <span class="font-normal">Siguiendo</span>
                    </p>
                    <p class="text-gray-800 text-sm mb-3 font-bold">
                        {{$user->followers->count()}}
                        <span class="font-normal">@choice('Seguidor|Seguidores',$user->followers->count())</span>
                    </p>
                    <p class="text-gray-800 text-sm mb-3 font-bold">
                        {{$user->posts->count()}}
                        <span class="font-normal">Publicaciones</span>
                    </p>
                </div>

                @if (auth()->user())
                    @if ($user->id !== auth()->user()->id)
                        @if ($user->siguiendo(auth()->user()))
                            
                            <div class="flex">
                                <form action={{route('user.unfollow',$user)}} method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="rounded-md bg-slate-950 hover:bg-slate-700 text-white font-semibold p-3 mt-2 block">
                                        Dejar de seguir
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="flex">
                                <form action={{route('user.follow',$user)}} method="POST">
                                    @csrf
                                    <button class="rounded-md bg-slate-950 hover:bg-slate-700 text-white font-semibold p-3 mt-2 block">
                                        Seguir
                                    </button>
                                </form>
                            </div>
                        @endif

                    @endif
                    
                @else
                    <div class="flex">
                        <a href={{route('login')}}>
                            <button class="rounded-md bg-slate-950 hover:bg-slate-700 text-white font-semibold p-3 mt-2 block">
                                Seguir
                             </button>
                        </a>
                    </div>
                @endif

                
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10 text-center">

        @if ($posts->count()>0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3">
                @foreach ($posts as $post)
                    <div class="flex flex-1 items-center justify-center w-fit">    
                        {{-- <h2>{{$post->imagen}}</h2> --}}
                        {{-- <div class="w-72 h-60 flex items-center mx-auto ">
                        </div> --}}
                        <a href="{{route('post.show',['post'=>$post,'user'=>$user])}}">
                            <img class="object-cover h-72 w-96 rounded-2xl" src="{{ asset('uploads').'/'.$post->imagen}}" alt="Imagen del post {{$post->user_id}}">
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- <div class="mt-3 p-2">
                {{$posts->links()}}
            </div> --}}
        @else

            <h1 class="font-bold text-4xl">No existen publicaciones</h1>
            
        @endif
        
    </section>


@endsection