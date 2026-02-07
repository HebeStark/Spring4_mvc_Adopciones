@extends('layouts.php')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow">
    <h1 class="text-2xl font-bold text-vilet-700 mb-6">
        Crear nuevo animal
    </h1>

    <div class="mb-4 p.4 bg-red-100 text-red-700 rounded">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error )
            <li>{{$error}}</li>                
            @endforeach
        </ul>
    </div>        
    @endif

    <form action="{{ route('animales.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1">
                Nombre
            </label>
            <input type="text" name="nombre" value="{{ old('nombre') }}"
             class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-violet-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1">
                Tipo
            </label>
            <select name="tipo"
            class="w-full border rounded px-3 py-2">
            <option value="">Seleccionar</option>
            <option value="perro" @selected(old('tipo') === 'perro')>Perro</option>
            <option value="gato" @selected(old('tipo') === 'gato')>Gato</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1">
                Edad
            </label>
            <input type="number" name="edad" value="{{ old('edad') }}" 
            class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1">
                Estado
            </label>
            <select name="estado" class="w-full border rounded px-3 py-2">
                <option value="disponible" @selected(old('estado') === ('adoptado'))>Adoptado</option>
            </select>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-1">Foto (URL)</label>
            <input type="text" name="foto" value="{{ old('foto') }}"
            class="w.full border rounded px-3 py-2">
        </div>

        <div class="flex justify-between"> <a href="{{ route('animales.index') }}"
            class="text-gray-600 hover:underline">Cancelar</a>

            <button type="submit" class="bg-violet-700 text-white px-6 py-2 rounded-lg hover:bg-vilet-800 transition">
                Guardar</button>
        </div>
    </form>
</div>
    
@endsection
