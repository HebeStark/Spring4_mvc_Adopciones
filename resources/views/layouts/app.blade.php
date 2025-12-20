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
        <div class="space-x-4">
            <div class="space-x-4">
                <a href="/" class="hover:text-violet-200">Inicio</a>
                <a href="/animales" class="hover:text-violet-200">Animales</a>
            </div>
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
            <p>&copy; 2025 Portal de Adopciones</p>
        </footer>
        @livewireScripts
    </body>
</html>
   