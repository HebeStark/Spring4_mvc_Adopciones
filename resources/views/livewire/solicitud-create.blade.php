<div>
    <div class="max-w-xl mx-auto mt-10 bg-white shadow rounded-xl p-8">
        <h1 class="text-3xl font-bold text-violet-700 mb-6">Solicitar Adopcion</h1>

        @if(session()->has('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                {{ session('error') }}
            </div>
        @endif
        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Animal</label>
                <select wire:model="animal_id" class="mt-1 w-full border-gray-300 rounded">
                    <option value="">Seleccione un animal</option>
                    @foreach($animales as $animal)
                        <option value="{{ $animal->id }}">{{ $animal->nombre }} ({{ $animal->tipo }})</option>
                    @endforeach
                </select>
                @error('animal_id') 
                <span class="text-red-600 text-sm">{{ $message }}</span>    
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" wire:model="nombre" class="mt-1 w-full border-gray-300 rounded">
                @error('nombre')
                <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" wire:model="email" class="mt-1 w-full border-gray-300 rounded">
                @error('email')
                <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Teléfono</label>
                <input type="text" wire:model="telefono" class="mt-1 w-full border-gray-300 rounded">
           </div>
           <div class="pt-4 flex justify-end">
            <button tipe="submit" class="bg-violet-700 hover:bg-violet-800 text-white px-4 py-2 rounded">
                Enviar Solicitud
            </button>
           </div>
        </form>

    </div>
</div>
