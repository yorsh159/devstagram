<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('styles')
    <title>Devstagram</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles
</head>
<body class="bg-gray-200">
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
        
        @auth
        <a class="text-3xl font-bold" href="/inicio">
            Devstagram
        </a>    
        @endauth
        
        @guest
        <a class="text-3xl font-bold" href="/">
            Devstagram
        </a>
        @endguest

        @auth
            <nav class="flex gap-2 items-center">

                <a href={{route('post.create')}} class="flex items-center gap-2 ring-2 ring-blue-300 p-2 rounded text-sm uppercase font-bold cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                    Nuevo Post
                </a>
                
                <a class="text-lg font-semibold" href={{route('post.home',['user'=>auth()->user()->usuario])}} >{{auth()->user()->nombre}}</a>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit"
                    class=" px-3 py-2 rounded-md font-bold text-white bg-blue-400" >Salir</button>
                </form>
                
            </nav>           
        @endauth

        @guest
            <nav class="flex gap-2">
                <a class="border-white border-2 px-3 py-2 rounded-md font-semibold text-black" href={{route('login')}}>Login</a>
                <a class="border-white border-2 rounded-xl bg-stone-950 text-white font-semibold px-3 py-2 hover:bg-white hover:text-black " href={{route('registro')}}>Crear cuenta</a>
            </nav>
        @endguest

        
        </div>
    </header>

    <main class="container mx-auto mt-10">
        <h2 class="font-bold text-3xl text-center mb-5">@yield('titulo')</h2>
        @yield('contenido')
    </main>

    <footer class="mt-1 text-center font-bold uppercase text-stone-50">
        Derechos Reservados - {{now()->year}}
    </footer>

    @livewireScripts

</body>
</html>