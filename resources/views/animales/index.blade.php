@extends('layouts.app')

@section('content')
    
        <div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-violet-700">
         Lista de Animales
    </h1>
    @auth
        @if(auth()->user()->isAdmin())
        <a href="{{ route('animales.create') }}"
        class="bg-violet-700 text-white px-4 py-2 rounded-lg hover:bg-violet-800 transition">
            + Nuevo Animal
        </a>
        @endif
    @endauth
        </div>
       <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                  @foreach($animales as $animal)              
                   <div class="bg-white rounded-xl shadow hover:shadow-lg transition">
                      <div class="p-5">
                   <h2 class="text-xl font-semibold text-gray-800">
                        {{ $animal->nombre}}
                   </h2>
                       
                   <p class="text-gray-500 mt-1">
                         ({{ $animal->tipo }} . {{ $animal->edad }} años)
                   </p>

                     @php
                       $disponible = trim(strtolower($animal->estado)) === 'disponible';
                     @endphp
                     <span class="inline-block mt-3 px-3 py-1 text-sm rounded-full
                    {{ $disponible ? 'bg-green-100 text-green-700' : 'bg-gray-300 text-gray-600' }}">
                    {{ ucfirst($animal->estado) }}
                </span>
                @if($disponible)
                <a href="{{ route('solicitudes.create') }}"
                   class="inline-block mt-3 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                  Adoptar
                </a>
                @else
                <span class="block mt-3 text-gray-400 text-sm">Ya adoptado</span>
                @endif
                
                @auth
                    @if(auth()->user()->isAdmin())                    
                    <a href ="{{ route('animales.edit', $animal) }}"
                    class="inline-block mt-4 bg-violet-700 text-white px-4 py-2 rounded-lg hover:bg-violet-800 transition">
                        Editar 
                    </a>
                    @endif
                @endauth

                <div class="mt-4">
                    <a href="{{ route('animales.show', $animal) }}"
                       class="inline-block text-violet-700 font-semibold hover:underline">
                        Ver detalle →
                    </a>
                    
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
    