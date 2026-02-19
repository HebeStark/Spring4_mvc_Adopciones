    <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-lg p-8">

    <h2 class="text-2xl font-bold text-gray-800 mb-8">
        Solicitud de adopción
    </h2>
        
       <div class="mb-8 p-4 bg-violet-50 border border-violet-100 rounded-lg text-sm text-gray-700">
        <strong class="text-violet-700">Animal seleccionado:</strong>
        {{ $animal->nombre }} ({{ $animal->tipo }})
    </div>

    <form wire:submit.prevent="save" class="space-y-6">

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Nombre
            </label>
            <input type="text"
                   wire:model="nombre"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg
                          focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-violet-500">
            @error('nombre')
                <span class="text-sm text-red-600 mt-1 block">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Email
            </label>
            <input type="email"
                   wire:model="email"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg
                          focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-violet-500">
            @error('email')
                <span class="text-sm text-red-600 mt-1 block">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Teléfono
            </label>
            <input type="text"
                   wire:model="telefono"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg
                          focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-violet-500">
            @error('telefono')
                <span class="text-sm text-red-600 mt-1 block">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="pt-4">
            <button type="submit"
                    class="w-full px-6 py-3 bg-violet-700 text-white rounded-lg shadow-md
                           hover:bg-violet-800 transition">
                Enviar solicitud
            </button>
        </div>

    </form>

</div>
