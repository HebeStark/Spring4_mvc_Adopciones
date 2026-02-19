<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Portal de Adopciones</title> 
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">           

        <script src="https://cdn.tailwindcss.com"></script>

        @livewireStyles   
    </head>
   <body class="min-h-screen bg-gray-100 text-gray-800 font-[Inter] flex flex-col">
      <nav class="bg-violet-700 text-white shadow">
         <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            
             <span class="text-xl font-bold tracking-tight">Adopciones</span>

             @php
                $navBase = 'px-4 py-2 rounded-lg transition text-sm';
                $navActive = 'bg-white text-violet-700 font-semibold shadow';
                $navInactive = 'text-white hover:bg-violet-600';
            @endphp

            <div class="space-x-2 flex items-center">
                
                  <a href="{{ route('home') }}"
                   class="{{ $navBase }} {{ request()->routeIs('home') ? $navActive : $navInactive }}">
                    Inicio
                </a>

                <a href="{{ route('animales.index') }}"
                   class="{{ $navBase }} {{ request()->routeIs('animales.*') ? $navActive : $navInactive }}">
                    Animales
                </a>

                @guest
                    <a href="{{ route('login') }}"
                       class="{{ $navBase }} {{ request()->routeIs('login') ? $navActive : $navInactive }}">
                        Login
                    </a>

                @endguest

                 @auth
                     @if(auth()->user()->isAdmin())

                        <a href="{{ route('dashboard') }}"
                           class="{{ $navBase }} {{ request()->routeIs('dashboard') ? $navActive : $navInactive }}">
                            Dashboard
                        </a>

                        <a href="{{ route('solicitudes.index') }}"
                           class="{{ $navBase }} {{ request()->routeIs('solicitudes.*') ? $navActive : $navInactive }}">
                            Solicitudes
                        </a>

                    @endif
                  
                 <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                                class="{{ $navBase }} {{ $navInactive }}">
                            Logout
                        </button>
                    </form>

                @endauth
            </div>
        </div>
    </nav>

    <main class="grow max-w-6xl mx-auto px-6 py-10">

        @if(session('success'))
            <div class="mb-6 p-4 rounded-lg bg-green-100 text-green-700 border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 p-4 rounded-lg bg-red-100 text-red-700 border border-red-200">
                {{ session('error') }}
            </div>
        @endif

        @isset($slot)
            {{ $slot }}
        @else
            @yield('content')
        @endisset

    </main>

    <footer class="bg-white border-t mt-12">
        <div class="max-w-6xl mx-auto px-6 py-6 text-center text-gray-500 text-sm">
            &copy; 2026 Portal de Adopciones
        </div>
    </footer>

    @livewireScripts
    
     </body>
</html>
