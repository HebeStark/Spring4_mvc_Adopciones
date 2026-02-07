@extends('layouts.app')
@section('content')

<div class="home">
    <h1>Bienvenidos al portal de Adopciones</h1>

    <p>Encuentra tu compañero/a y dale un hogar</p>
   
    <img src="{{ asset('images/sombra_animales.jpg') }}"
        alt="Silueta de animales"
        class="max-w-md w-full opacity-10 mb-10">

    <a href="{{ route('animales.index') }}">
        Ver Animales en Adopción
    </a>
</div>
@endsection