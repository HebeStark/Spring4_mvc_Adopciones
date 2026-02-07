<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Portal de Adopciones</title> 
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">           
   
    </head>
   <body class="app-body">
      <nav class="navbar">
         <div class="navbar-container">
             <span class="navbar-brand">Adopciones</span>

             <div class="navbar-links">

                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'nav-link active' : 'nav-link' }}">
                Inicio
                </a>

                <a href="{{ route('animales.index') }}" class="{{ request()->routeIs('animales.*') ? 'nav-link active' : 'nav-link' }}">
                Animales
                </a>

                @guest

                <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'nav-link active' : 'nav-link' }}">
                    Login
                </a>

                @endguest

                 @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'nav-link active' : 'nav-link' }}">
                        Dashboard
                    </a>

                    <a href="{{ route('solicitudes.index') }}" class="{{ request()->routeIs('solicitudes.*') ? 'nav-link active' : 'nav-link' }}">
                        Solicitudes
                    </a>
                @endif

                <form method="POST" action="{{ route('logout') }}" class="logout-form">

                    @csrf

                    <button type="submit" class="nav-link">
                        Logout
                    </button>                    
                </form>
            @endauth

             </div>
         </div>
      </nav>

      <main class="main-container">
    @yield('content')
</main>


<footer class="footer">
    <p>&copy; 2026 Portal de Adopciones</p>
</footer>

   </body>
</html>
