@extends('layouts.app')
@section('content')
<h1>{{$animal->nombre}}</h1>
<p>Tipo: {{ $animal->tipo }}</p>
<p>Edad: {{ $animal->edad }}</p> 
<p>Estado: {{ $animal->estado }}</p>

<a href="{{ route('animales.index') }}">Volver a la lista de animales</a>
@endsection
    
       