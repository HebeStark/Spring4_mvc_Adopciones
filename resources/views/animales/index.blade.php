@extends('layouts.app')

@section('content')
    
        <h1 class="text-3xl font-bold text-violet-700 mb-6">Lista de Animales</h1>
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
                     <span class="inline-block mt-3 px-3 py-1 text-sm rounded-full
                    {{ $animal->estado === 'disponible'
                        ? 'bg-green-100 text-green-700'
                        : 'bg-gray-300 text-gray-600' }}">
                    {{ ucfirst($animal->estado) }}
                </span>

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
    