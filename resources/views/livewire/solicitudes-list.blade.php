<div class="max-w-6xl mx-auto">

    <h1 class="text-3xl font-bold text-gray-800 mb-10">
        Solicitudes de Adopción
    </h1>

    @if(session()->has('success'))
        <div class="mb-6 p-4 rounded-lg bg-green-100 text-green-700 border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">

                {{-- Cabecera --}}
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Animal
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Adoptante
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Estado
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Fecha
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Acciones
                        </th>
                    </tr>
                </thead>

                {{-- Cuerpo --}}
                <tbody class="bg-white divide-y divide-gray-100">

                    @forelse($solicitudes as $solicitud)

                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-6 py-4 text-sm font-medium text-gray-800">
                                {{ $solicitud->animal->nombre }}
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $solicitud->adoptante->nombre }}
                            </td>

                            {{-- Estado --}}
                            <td class="px-6 py-4">
                                @php $estado = $solicitud->estado; @endphp

                                <span class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full
                                    {{ $estado === 'pendiente' ? 'bg-yellow-100 text-yellow-700'
                                    : ($estado === 'aprobada' ? 'bg-green-100 text-green-700'
                                    : 'bg-red-100 text-red-700') }}">
                                    {{ ucfirst($estado) }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $solicitud->created_at->format('d/m/Y') }}
                            </td>

                            {{-- Acciones --}}
                            <td class="px-6 py-4">
                                @if($estado === 'pendiente')
                                    <div class="flex gap-3">

                                        <button 
                                            wire:click="aprobarSolicitud({{ $solicitud->id }})"
                                            class="px-4 py-1.5 bg-green-600 text-white text-sm rounded-lg
                                                   hover:bg-green-700 transition shadow-sm">
                                            Aprobar
                                        </button>

                                        <button 
                                            wire:click="rechazarSolicitud({{ $solicitud->id }})"
                                            class="px-4 py-1.5 bg-red-600 text-white text-sm rounded-lg
                                                   hover:bg-red-700 transition shadow-sm">
                                            Rechazar
                                        </button>

                                    </div>
                                @endif
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                No hay solicitudes registradas.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>
        </div>

    </div>

</div>
