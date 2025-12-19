@extends('layouts.app')
@section('content')
<a href="/animales" class="text-violet-600 hover:underline mb-6 inline-block">
    ← Volver al listado
</a>
<div class="bg-white rounded-xl shadow p-8 max-w-xl">
    <h1 class="text-3xl font-bold text-violet-700 mb-4">
        {{ $animal->nombre }}
    </h1>
<div class="space-y-2 text-gray-700">
        <p><strong>Tipo:</strong> {{ $animal->tipo }}</p>
        <p><strong>Edad:</strong> {{ $animal->edad }} años</p>
        <p>
            <strong>Estado:</strong>
            <span class="px-3 py-1 rounded-full text-sm
                {{ $animal->estado === 'disponible'
                    ? 'bg-green-100 text-green-700'
                    : 'bg-gray-300 text-gray-600' }}">
                {{ ucfirst($animal->estado) }}
            </span>
        </p>
    </div>
</div>

@endsection

