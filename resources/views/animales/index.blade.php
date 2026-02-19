@extends('layouts.app')

@section('content')
    
        <div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold tracking-tight text-gray-800">
         Lista de Animales
    </h1>
    @auth
        @if(auth()->user()->isAdmin())
        <a href="{{ route('animales.create') }}"
        class="px-4 py-2 bg-violet-700 text-white rounded-lg shadow hover:bg-violet-800 transition text-sm">
            + Nuevo Animal
        </a>
        @endif
    @endauth
        </div>             
                
        @if($animales->isEmpty())
            <div class="bg-white rounded-xl shadow p-10 text-center text-gray-500">
                No hay animales disponibles en este momento.
            </div>
        @else

       <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                  @foreach($animales as $animal)   
                    @php
                        $disponible = trim(strtolower($animal->estado)) === 'disponible';
                    @endphp

            <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition overflow-hidden flex flex-col">

                <img src="{{ asset($animal->foto) }}"
                    class="w-full h-56 object-cover" alt="{{ $animal->nombre }}">

            <div class="p-6 flex flex-col grow">

                <h2 class="text-xl font-semibold text-gray-800 mb-2">
                    {{ $animal->nombre }}
                </h2>

                <p class="text-gray-500 text-sm mb-4">
                    {{ $animal->tipo }} · {{ $animal->edad }} años
                </p>

                <span class="inline-block px-3 py-1 text-xs rounded-full mb-4
                    {{ $disponible
                        ? 'bg-green-100 text-green-700'
                        : 'bg-gray-200 text-gray-600' }}">
                    {{ ucfirst($animal->estado) }}
                </span>

                <div class="mt-auto flex flex-wrap gap-3">

                    @if($disponible)
                        <a href="{{ route('solicitudes.create', $animal) }}"
                           class="px-4 py-2 bg-violet-700 text-white rounded-lg hover:bg-violet-800 transition text-sm">
                            Adoptar
                        </a>
                    @endif

                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('animales.edit', $animal) }}"
                               class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-900 transition text-sm">
                                Editar
                            </a>
                        @endif
                    @endauth

                    <a href="{{ route('animales.show', $animal) }}"
                       class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-sm">
                        Ver detalle →
                    </a>

                </div>

            </div>
        </div>

    @endforeach

</div>

@endif

@endsection
