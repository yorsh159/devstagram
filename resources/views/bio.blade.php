@extends('layouts.app')

@section('titulo')
    Añade una foto o imagen
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-1/2 md:flex gap-3">
            <div class="md:w-1/3 lg:w-1/2 px-5 rounded-lg bg-white">
                <img src="{{asset('img/user.png')}}" alt="Imagen defecto"/>
            </div>
            <div class="md:w-2/3 lg:w-1/2 p-3  rounded-lg bg-white">
                <p class="text-gray-700 text-2xl font-semibold mb-3 flex justify-center">{{auth()->user()->nombre}}</p>
                <p class="text-gray-700 font-semibold mb-2" for="bio">Deja que te conozcan:</p>
                <textarea name="bio" id="bio" cols="45" rows="10" placeholder="Cuenta lo que quieres que sepan sobre ti..." 
                class="resize-none hover:resize rounded-md border-slate-500 border-2"></textarea>
            </div>
        </div>
    </div>
    <div class="flex justify-center p-2">
        <a class="rounded-md bg-gray-950 text-white font-semibold px-3 py-2 hover:bg-white hover:text-black " href="home">Siguiente</a>
    </div>
@endsection