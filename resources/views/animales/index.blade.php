@extends('layouts.app')

@section('content')
    
        <div class="animal-header">
    <h1 class="animals-title">
         Lista de Animales
    </h1>
    @auth
        @if(auth()->user()->isAdmin())
        <a href="{{ route('animales.create') }}"
        class="btn btn-primary">
            + Nuevo Animal
        </a>
        @endif
    @endauth
        </div>        

       <div class="animals-grid">
                  @foreach($animales as $animal)              
                   <div class="animal-card">
                   
                   <img src="{{ $animal->foto ?: 'https://via.placeholder.com/400x250' }}"
                          class="animal-image">
                     
             <div class="animal-body">
                   <h2 class="animal-name">
                        {{ $animal->nombre}}
                   </h2>
                       
                   <p class="animal-meta">
                         ({{ $animal->tipo }} . {{ $animal->edad }} años)
                   </p>

                     @php
                       $disponible = trim(strtolower($animal->estado)) === 'disponible';
                     @endphp
                     <span class="animal-status {{ $disponible ? 'bg-green-100 text-green-700' : 'bg-gray-300 text-gray-600' }}">
                    {{ ucfirst($animal->estado) }}
                </span>
                @if($animal->estado === 'disponible')
                <a href="{{ route('solicitudes.create', $animal) }}"
                   class=" btn btn-primary">
                  Adoptar
                </a>
                @endif
                
                @auth
                    @if(auth()->user()->isAdmin())                    
                    <a href ="{{ route('animales.edit', $animal) }}"
                    class="btn btn-primary">
                        Editar 
                    </a>
                    @endif
                @endauth

                <div class="animal-detail">
                    <a href="{{ route('animales.show', $animal) }}"
                       class="animal-link">
                        Ver detalle →
                    </a>                    
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
    