@extends('layouts.app')

@section('content')
    
        <h1>Lista de Animales</h1>
        <ul>
        
            @foreach($animales as $animal)              
                            <li>
                            <a href="{{ route('animales.show', $animal) }}">
                                {{ $animal->nombre}} ({{ $animal->tipo }})
                            </a>
                            </li>
                            @endforeach
</ul>
                       
                                