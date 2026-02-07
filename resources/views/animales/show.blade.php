@extends('layouts.app')
@section('content')
<a href="{{ route ('animales.index') }}"  class="back-link">
    ← Volver al listado
</a>
<img src="{{ $animal->foto ?: 'https://via.placeholder.com/600x400' }}"
class="animal-show-image">

<div class="animal-show-card">
    <h1 class="animal-show-title">
        {{ $animal->nombre }}
    </h1>
<div class="animal-show-info">
        <p><strong>Tipo:</strong> {{ $animal->tipo }}</p>
        <p><strong>Edad:</strong> {{ $animal->edad }} años</p>
        <p>
            <strong>Estado:</strong>
            <span class="animal-status {{ $animal->estado === 'disponible'
                    ? 'status-available'
                    : 'status-unavailable' }}">
                {{ ucfirst($animal->estado) }}
            </span>
        </p>
    </div>
</div>

@endsection

