@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-lg p-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-8">
        Editar Animal
    </h1>

    @if ($errors->any())
    <div class="mb-6 p-4 rounded-lg bg-red-100 text-red-700 border border-red-200">
        <ul class="llist-disc list-inside space-y-1 text-sm">
            @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>   
            @endforeach
        </ul>
    </div>      

    @endif
       @if($animal->foto)
        <img src="{{ asset($animal->foto) }}"
         class="w-full h-56 object-cover rounded-xl mb-6 shadow-sm"
         alt="{{ $animal->nombre }}">
    @endif
   
    <form action="{{ route('animales.update', $animal) }}"
          method="POST"
          class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">
                Nombre
            </label>
            <input type="text"
                   id="nombre"
                   name="nombre"
                   value="{{ old('nombre', $animal->nombre) }}"
                   required
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-violet-500">
        </div>

        <div>
            <label for="tipo" class="block text-sm font-medium text-gray-700 mb-1">
                Tipo
            </label>
            <select name="tipo"
                    id="tipo"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-violet-500">
                <option value="">Seleccionar</option>
                <option value="perro" @selected(old('tipo', $animal->tipo) === 'perro')>
                    Perro
                </option>
                <option value="gato" @selected(old('tipo', $animal->tipo) === 'gato')>
                    Gato
                </option>
            </select>
        </div>

        <div>
            <label for="edad" class="block text-sm font-medium text-gray-700 mb-1">
                Edad
            </label>
            <input type="number"
                   id="edad"
                   name="edad"
                   min="0"
                   value="{{ old('edad', $animal->edad) }}"
                   required
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-violet-500">
        </div>

        <div>
            <label for="estado" class="block text-sm font-medium text-gray-700 mb-1">
                Estado
            </label>
            <select name="estado"
                    id="estado"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-violet-500">
                <option value="disponible" @selected(old('estado', $animal->estado) === 'disponible')>
                    Disponible
                </option>
                <option value="adoptado" @selected(old('estado', $animal->estado) === 'adoptado')>
                    Adoptado
                </option>
            </select>
        </div>

        <div>
            <label for="foto" class="block text-sm font-medium text-gray-700 mb-1">
                Ruta de la Foto
            </label>
            <input type="text"
                   id="foto"
                   name="foto"
                   value="{{ old('foto', $animal->foto) }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-violet-500">
        </div>

        <div class="flex justify-end gap-4 pt-6 border-t">
            <a href="{{ route('animales.index') }}"
               class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                Cancelar
            </a>

            <button type="submit"
                    class="px-6 py-2 bg-violet-700 text-white rounded-lg shadow-md hover:bg-violet-800 transition">
                Actualizar
            </button>
        </div>

    </form>

    <div class="mt-8 pt-6 border-t">
        <form action="{{ route('animales.destroy', $animal) }}"
              method="POST"
              onsubmit="return confirm('¿Estás seguro de eliminar este animal?');">
            @csrf
            @method('DELETE')

            <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition shadow-sm">
                Eliminar Animal
            </button>
        </form>
    </div>

</div>

@endsection
