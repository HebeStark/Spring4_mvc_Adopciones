@extends('layouts.app')
@section('content')
<div class=" flex flex-col items-center text-center mt-20">
    <h1 class="text-5xl font-extrabold text-red-600 underline">
    PRUEBA TAILWIND
</h1>
    <h1 class="text-4xl font-bold text-violet-700 mb-4">Bienvenidos al portal de Adopciones</h1>

    <p class="text-gray-600 mb-10">Encuentra tu compañero/a y dale un hogar</p>
   
    <img src="{{ asset('images/sombra_animales.jpg') }}"
        alt="Silueta de animales"
        class="max-w-md w-full opacity-10 mb-10">

    <a href="{{ route('animales.index') }}" 
    class="bg-violet-700 text-white px-6 py-3 rounded-lg hover:bg-violet-800">
        Ver Animales en Adopción
    </a>
</div>
@endsection