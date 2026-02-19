@extends('layouts.app')
@section('content')
<a href="{{ route ('animales.index') }}"  class="inline-block mb-8 text-violet-700 hover:text-violet-900 transition text-sm font-medium">
    ← Volver al listado
</a>

<div class="bg-white rounded-2xl shadow-sm p-8 max-w-5xl mx-auto">

    <div class="grid md:grid-cols-2 gap-10 items-center">
 
        <div>
            <img src="{{ asset($animal->foto) }}"
                 alt="{{ $animal->nombre }}"
                 class="w-full h-80 object-cover rounded-xl">
        </div>

        <div>

            <h1 class="text-3xl font-bold tracking-tight text-gray-800 mb-6">
                {{ $animal->nombre }}
            </h1>

            @php
                $disponible = trim(strtolower($animal->estado)) === 'disponible';
            @endphp

            <div class="space-y-4 text-gray-600">

                <p>
                    <span class="font-semibold text-gray-700">Tipo:</span>
                    {{ $animal->tipo }}
                </p>

                <p>
                    <span class="font-semibold text-gray-700">Edad:</span>
                    {{ $animal->edad }} años
                </p>

                <p>
                    <span class="font-semibold text-gray-700">Estado:</span>
                    <span class="inline-block px-3 py-1 text-xs rounded-full
                        {{ $disponible
                            ? 'bg-green-100 text-green-700'
                            : 'bg-gray-200 text-gray-600' }}">
                        {{ ucfirst($animal->estado) }}
                    </span>
                </p>

            </div>

            @if ($disponible)
                <div class="mt-8">
                    <a href="{{ route('solicitudes.create', $animal) }}"
                       class="px-4 py-2 bg-violet-700 text-white rounded-lg hover:bg-violet-800 transition text-sm">
                        Adoptar
                    </a>
                </div>
            @endif

        </div>

    </div>
</div>

@endsection