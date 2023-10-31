@extends('layouts.app')

@section('titulo')

    Nuevo Post

@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')

<div class="md:flex md:items-center">

    <div class="md:w-1/2 px-10">
        <form action={{ route('imagen.store') }} method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
            @csrf
        </form>
    </div>
    <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
        <form action="{{route('post.store')}}" method="POST">
            @csrf
            <div class="mb-2">
                <textarea name="descripcion" 
                          id="descripcion" 
                          rows="10"
                          placeholder="  Comparte el momento <3 " 
                          class="rounded resize-none border-2 w-full p-1
                          @error('descripcion')
                            border-red-500
                          @enderror"></textarea>
            </div>
            
            @error('descripcion')
                <div class="flex items-center font-semibold text-sm rounded-md text-red-500/75 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                    </svg>                      
                    <span>{{$message}}</span>
                </div>
            @enderror

            <div class="mb-2">
                <input type="hidden" name="imagen" value="{{old('imagen')}}">
            </div>
            @error('imagen')
                <div class="flex items-center font-semibold text-sm rounded-md text-red-500/75 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                    </svg>                      
                    <span>{{$message}}</span>
                </div>
            @enderror

            <button class="rounded-md bg-slate-950 hover:bg-slate-700 text-white font-semibold p-3 mt-2 block">
                Postear!  
            </button>
        </form>
    </div>

</div>

@endsection