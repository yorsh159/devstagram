@extends('layouts.app')

@section('titulo')
    Crea tu cuenta
@endsection

@section('contenido')
    <div class="flex">


    <div class="bg-white rounded-md w-96 mx-auto p-5">
        <form action="/registro" method="POST" novalidate>
            @csrf
            <div class="mb-2">
                <label for="nombre" class="block">Nombre Completo</label>
                <input id="nombre" name="nombre" type="text" placeholder="Ingresa tu nombre"  class="rounded-md border w-full p-1
                    @error('nombre')
                        border-red-500
                    @enderror"
                    value="{{old('nombre')}}">    
                @error('nombre')
                <div class="flex items-center font-semibold text-sm rounded-md text-red-500/75 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                    </svg>                      
                    <span class=>{{$message}}</span>
                </div>
                @enderror
            </div>
            

            <div  class="mb-2">
                <label for="usuario" class="block">Usuario</label>
                <input id="usuario" name="usuario" type="text" placeholder="Ingresa tu usuario" class="rounded-md border w-full p-1
                    @error('usuario')
                        border-red-500
                    @enderror">
                @error('usuario')
                <div class="flex items-center font-semibold text-sm rounded-md text-red-500/75 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                    </svg>                      
                    <p>{{$message}}</p>
                </div>
                @enderror
            </div>
            

            <div  class="mb-2">
                <label for="password" class="block">Contraseña</label>
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
            

            <div  class="mb-2">
                <label class="block">Repetir Contraseña</label>
                <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Repite contraseña" class="rounded-md border w-full p-1">
            </div>

            <div  class="mb-2">
                <label for="email" class="block">Correo</label>    
                <input id="email" name="email" type="email" placeholder="Ingresa tu correo" class="rounded-md border w-full p-1
                    @error('email')
                        border-red-500
                    @enderror">
                @error('email')
                <div class="flex items-center font-semibold text-sm rounded-md text-red-500/75 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                    </svg>                      
                    <span class=>{{$message}}</span>
                </div>
                @enderror
            </div>
            
                <button class="rounded-md bg-slate-950 hover:bg-slate-700 text-white font-semibold p-3 mt-2 block">
                    Registrarse   
                </button>
        </form>
        
    </div>

</div>
@endsection