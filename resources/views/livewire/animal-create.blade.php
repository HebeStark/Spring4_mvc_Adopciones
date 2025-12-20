<div>
      <div class="max-w-xl mx-auto bg-white rounded-xl shadow p-8">
    <h1 class="text-2xl font-bold text-violet-700 mb-6">
        Nuevo Animal
    </h1>
    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Nombre</label>
            <input
                type="text"
                wire:model.defer="nombre"
                class="mt-1 w-full rounded-lg border-gray-300 focus:border-violet-500 focus:ring-violet-500"
            >
            @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Tipo</label>
                <select
                    wire:model.defer="tipo"
                    class="mt-1 w-full rounded-lg border-gray-300 focus:border-violet-500 focus:ring-violet-500"
                >
                    <option value="">Seleccione un tipo</option>
                    <option value="perro">Perro</option>
                    <option value="gato">Gato</option>
                </select>
                @error('tipo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Edad</label>
                <input
                    type="number"
                    wire:model.defer="edad"
                    class="mt-1 w-full rounded-lg border-gray-300 focus:border-violet-500 focus:ring-violet-500"
                >
                @error('edad') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Estado</label>
                <select
                    wire:model.defer="estado"
                    class="mt-1 w-full rounded-lg border-gray-300 focus:border-violet-500 focus:ring-violet-500"
                >
                    <option value="disponoble">Disponible para adopción</option>
                    <option value="adoptado">Adoptado</option>
                </select>
                @error('estado') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end pt-4">
                <button
                    type="submit"
                    class="bg-violet-700 text-white px-6 py-2 rounded-lg hover:bg-violet-800 transition"
                wire:loading.attr="disabled">
                <span wire:loading.remove>Guardar</span>
                <span wire:loading>Guardando...</span>
                </button>
            </div>

        </form>
    </div>
</div>


