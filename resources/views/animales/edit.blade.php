@extends('layouts.app')

@section('content')

<div class="form-card">
    <h1 class="form-title">
        Editar Animal
    </h1>

    @if ($errors->any())
    <div class="form-errors">
        <ul>
            @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>                
            @endforeach
        </ul>
    </div>        
    @endif
      <form action="{{ route('animales.update', $animal) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre"
                   value="{{ old('nombre', $animal->nombre) }}">
        </div>

        <div class="form-group">
            <label>Tipo</label>
            <select name="tipo">
                <option value="">Seleccionar</option>
                <option value="perro" @selected(old('tipo', $animal->tipo) === 'perro')>Perro</option>
                <option value="gato" @selected(old('tipo', $animal->tipo) === 'gato')>Gato</option>
            </select>
        </div>
         <div class="form-group">
            <label>Edad</label>
            <input type="number" name="edad"
                   value="{{ old('edad', $animal->edad) }}">
        </div>

        <div class="form-group">
            <label>Estado</label>
            <select name="estado">
                <option value="disponible" @selected(old('estado', $animal->estado) === 'disponible')>
                    Disponible
                </option>
                <option value="adoptado" @selected(old('estado', $animal->estado) === 'adoptado')>
                    Adoptado
                </option>
            </select>
        </div>
          <div class="form-group">
            <label>Foto (URL)</label>
            <input type="text" name="foto"
                   value="{{ old('foto', $animal->foto) }}">
        </div>

        <div class="form-actions">
            <a href="{{ route('animales.index') }}" class="form-cancel">
                Cancelar
            </a>

            <button type="submit" class="btn btn-primary">
                Actualizar
            </button>
        </div>
    </form>
</div>
    
@endsection