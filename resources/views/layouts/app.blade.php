<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Portal de Adopciones</title> 
         @vite('resources/css/app.css')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">           
    @livewireStyles
    </head>
   <body class="bg-gray-100 text-gray-800 font-[Inter]">
      <nav class="bg-violet-700 text-white shadow">
         <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
             <span class="text-xl font-bold">Adopciones</span>

             @php
             $navBase = 'px-4 py-2 rounded-lg transition';
             $navActive = 'bg-white text-violet-700 font-semibold shadow';
             $navInactive = 'text-white hover:bg-violet-600';
             @endphp

        <div class="space-x-4">

                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') 
                ? $navActive : $navInactive }}">Inicio</a>

                <a href="{{ route('animales.index') }}" class="{{ $navBase }} {{ request()->routeIs('animales.*') ?
                $navActive : $navInactive }}">Animales</a>

               @guest
                <a href="{{ route('login')}}" class="{{ $navBase }} {{ request()->routeIs('login') ?
                $navActive : $navInactive }}">Login</a>
              @endguest

      @auth
            @if(auth()->user()->isAdmin())
                <a href="{{ route('dashboard') }}" class="{{ $navBase }} {{ request()->routeIs('dashboard') ?
                    $navActive : $navInactive }}">Dashboard</a>
                    
                <a href="{{ route('solicitudes.index') }}" class="{{ $navBase }} {{ request()->routeIs('solocitudes.*') ?
                    $navActive : $navInactive }}">Solicitudes</a>
            @endif
      
        <form method="POST" action="{{ route('logout')}}" class="inline">
            @csrf
            <button type="submit" class="{{ $navBase}} {{ $navInactive}}">Logout</button>
        
        </form>    
                @endauth
            </div>
       
         </div>
       </nav>
    <main class="max-w-6xl mx-auto px-6 py-8">
     @isset($slot)  
         {{ $slot }}
     @else
        @yield('content')
    @endisset
    </main>

       <footer class="bg-gray-200 text-center text-sm text-gray-600 py-4">
            <p>&copy; 2026 Portal de Adopciones</p>
        </footer>
        @livewireScripts
    </body>
</html>
   