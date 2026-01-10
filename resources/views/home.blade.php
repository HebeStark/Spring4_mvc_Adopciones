@extends('layouts.app')
@section('content')
<div class="text-center mt-20">
    <h1 class="text-4xl font-bold text-violet-700 mb-4">Bienvenidos al portal de Adopciones</h1>
    <p class="text-gray-600 mb-8">Encuentra tu compañero/a y dale un hogar</p>
    <a href="{{ route('animales.index') }}" 
    class="bg-violet-700 text-white px-6 py-3 rounded-lg hover:bg-violet-800">
        Ver Animales en Adopción
    </a>
</div>
@endsection