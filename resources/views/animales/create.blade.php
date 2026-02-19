@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-lg p-8">

    <h1 class="text-2xl font-bold text-gray-800 mb-8">
        Crear nuevo animal
    </h1>

    @if ($errors->any())
        <div class="mb-6 p-4 rounded-lg bg-red-100 text-red-700 border border-red-200">
            <ul class="list-disc list-inside space-y-1 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('animales.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Nombre
            </label>
            <input type="text"
                   name="nombre"
                   value="{{ old('nombre') }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg
                          focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-violet-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Tipo
            </label>
            <select name="tipo"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg
                           focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-violet-500">
                <option value="">Seleccionar</option>
                <option value="perro" @selected(old('tipo') === 'perro')>
                    Perro
                </option>
                <option value="gato" @selected(old('tipo') === 'gato')>
                    Gato
                </option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Edad
            </label>
            <input type="number"
                   name="edad"
                   value="{{ old('edad') }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg
                          focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-violet-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Estado
            </label>
            <select name="estado"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg
                           focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-violet-500">
                <option value="disponible" @selected(old('estado') === 'disponible')>
                    Disponible
                </option>
                <option value="adoptado" @selected(old('estado') === 'adoptado')>
                    Adoptado
                </option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Ruta de la imagen (ej: images/michu.jpg)
            </label>
            <input type="text"
                   name="foto"
                   value="{{ old('foto') }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg
                          focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-violet-500">
        </div>

        <div class="flex justify-end gap-4 pt-6 border-t">
            <a href="{{ route('animales.index') }}"
               class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                Cancelar
            </a>

            <button type="submit"
                    class="px-6 py-2 bg-violet-700 text-white rounded-lg shadow-md
                           hover:bg-violet-800 transition">
                Guardar
            </button>
        </div>

    </form>

</div>

@endsection
