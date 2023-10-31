@extends('layouts.app')

@section('titulo')
    Editar Perfil {{auth()->user()->usuario}}
@endsection

@section('contenido')
    <div class="bg-white rounded-md w-96 mx-auto p-5">
        <form action="{{route('perfil.store',auth()->user()->usuario)}}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            @if (session('mensaje'))
            <div class="flex items-center font-semibold text-sm rounded-md text-red-500/75 mt-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                </svg>                      
                <span>{{session('mensaje')}}</span>
            </div>  
            @endif
            <div class="mb-2">
                <label for="usuario" class="block">Usuario</label>
                <input id="usuario" name="usuario" type="text" placeholder="Ingresa tu nombre"  class="rounded-md border w-full p-1
                    @error('usuario')
                        border-red-500
                    @enderror"
                    value="{{auth()->user()->usuario}}">    
                @error('usuario')
                <div class="flex items-center font-semibold text-sm rounded-md text-red-500/75 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                    </svg>                      
                    <span class=>{{$message}}</span>
                </div>
                @enderror
            </div>
            
            <div class="mb-2">
                <label for="email" class="block">E-mail</label>
                <input id="email" name="email" type="text" placeholder="Ingresa email"  class="rounded-md border w-full p-1
                    @error('email')
                        border-red-500
                    @enderror"
                    value="{{auth()->user()->email}}">    
                @error('email')
                <div class="flex items-center font-semibold text-sm rounded-md text-red-500/75 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                    </svg>                      
                    <span class=>{{$message}}</span>
                </div>
                @enderror
            </div>

            <div  class="mb-2">
                <label for="old_password" class="block">Contraseña actual</label>
                <input id="old_password" name="old_password" type="password" placeholder="Ingresa una contraseña" class="rounded-md border w-full p-1
                    @error('old_password')
                        border-red-500
                    @enderror">
                @error('old_password')
                <div class="flex items-center font-semibold text-sm rounded-md text-red-500/75 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                    </svg>                      
                    <span class=>{{$message}}</span>
                </div>
                @enderror
            </div>

            <div  class="mb-2">
                <label for="password" class="block">Nueva contraseña</label>
                <input id="password" name="password" type="password" placeholder="Ingresa una contraseña" class="rounded-md border w-full p-1
                    @error('password')
                        border-red-500
                    @enderror">
                @error('password')
                <div class="flex items-center font-semibold text-sm rounded-md text-red-500/75 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                    </svg>                      
                    <span class=>{{$message}}</span>
                </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="imagen" class="block">Imagen de tu perfil</label>
                <input type="file" name="imagen" id="imagen" class="rounded-md border w-full p-1" accept=".jpg, .jpeg. png">
            </div>

            <button class="rounded-md bg-slate-950 hover:bg-slate-700 text-white font-semibold p-3 mt-2 block">
                Actualizar   
            </button>
        </form>
    </div>    
@endsection