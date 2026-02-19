@extends('layouts.app')
@section('content')

<div class="flex flex-col items-center text-center mt-20">
    
    <h1 class="text-4xl font-bold tracking-tight text-violet-700 mb-6">
        Bienvenidos al portal de Adopciones</h1>

    <p class="text-gray-600 mb-12 text-lg max-w-xl">
        Encuentra tu compañero/a y dale un hogar</p>
   
    <img src="{{ asset('images/sombra_animales.jpg') }}"
        alt="Silueta de animales"
        class="max-w-md w-full opacity-10 mb-12">

    <a href="{{ route('animales.index') }}"  
    class="px-6 py-3 bg-violet-700 text-white rounded-lg
     hover:bg-violet-800 transition text-sm shadow">
        Ver Animales en Adopción
    </a>
</div>
@endsection