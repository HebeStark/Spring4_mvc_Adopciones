<div>
    <div class="max-w-5xl mx-auto mt-6">
        <h1 class="text-3xl font-bold text-violet-700 mb-6">
            Solicitudes de Adopción
        </h1>

        @if(session()->has('success'))
            <div class="mb-4 bg-green-100 text-geen-700 px-4 py-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded-xl overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-grey-100 text-gray-700 text-sm">
                    <tr>
                        <th class="px-4 py-3">Animal</th>
                        <th class="px-4 py-3">Adoptante</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3">Fecha</th>
                        <th class="px-4 py-3">Acciones</th>                
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($solicitudes as $solicitud)
                        <tr>
                            <td class="px-4 py-3">{{ $solicitud->animal->nombre }}</td>
                            <td class="px-4 py-3">{{ $solicitud->adoptante->name }}</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 rounded text-sm
                                @if($solicitud->estado === 'pendiente') bg-yellow-100 text-yellow-700
                                @elseif($solicitud->estado === 'aprobada') bg-green-100 text-green-700
                                @else bg-red-100 text-red-700
                                @endif">
                                    {{ ucfirst($solicitud->estado) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-700">
                                {{ $solicitud->created_at->format('d/m/Y') }}
                            </td>
                            <td class="px-4 py-3 space-x-2">
                                @if($solicitud->estado === 'pendiente')
                                    <button wire:click="aprobarSolicitud({{ $solicitud->id }})"
                                        class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">
                                        Aprobar
                                    </button>
                                    <button wire:click="rechazarSolicitud({{ $solicitud->id }})"
                                        class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                        Rechazar
                                    </button>
                                    @endif
                                </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                                No hay solicitudes registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
         </div>
    </div>
    
</div>