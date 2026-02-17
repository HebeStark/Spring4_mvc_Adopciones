@extends('layouts.app')
@section('content')
<a href="{{ route ('animales.show', $animal) }}"  class="back-link">
    ← Volver al detalle del animal
</a>
<h1>Solicitar adopcion</h1>
<livewire:solicitud-create :animal="$animal" />
@endsection