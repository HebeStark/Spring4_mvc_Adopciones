<div>
    <div class="max-w-4xl mx-auto mt-8">
        <h1 class="text-3xl font-bold text-violet-700 mb-6">Solicitudes de adopción</h1>
        @if session()->has('success')
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="space-y-4">
            @forelse ($solicitudes as $solicitud)
                <div class="bg-white shadow rounded.xl p-5 flex justify-between items-center">
                    <div>
                        <p class="font-semibold text-lg">{{ $solicitud->adoptante->nombre }} 
                            quiere adoptar a <span class="text-violet-600">{{ $solicitud->animal->nombre }}</span>
                        </p>

                        <p class="text-sm text-gray-600">Estado:
                            <span class="font-medium capitalize">{{ $solicitud->estado }}</span>
                        </p>
                    </div>
                        <div class="flex gap-2">
                             @if ($solicitud->estado === 'pendiente')
                                 <button wire:click="aprobarSolicitud({{ $solicitud->id }})"
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                                Aprobar
                                  </button>
                                 <button wire:click="rechazarSolocitud({{ $solicitud->id }})"
                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                                Rechazar
                                 </button>
                             @else
                            <span class="text-gray-500 italic">Acción finalizada</span>
                            @endif
                           </div>
                    </div>
                @empty
                <p class="text-gray-600">No hay solicitudes de adopción en este momento.</p>
            @endforelse
        </div>
    </div>
                   
</div>
