<div class="solicitudes-container">
        <h1 class="page-title">
            Solicitudes de Adopción
        </h1>

        @if(session()->has('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-wrapper">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Animal</th>
                        <th>Adoptante</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Acciones</th>                
                    </tr>
                </thead>

                <tbody>
                    @forelse($solicitudes as $solicitud)
                        <tr>
                            <td>{{ $solicitud->animal->nombre }}</td>
                            <td>{{ $solicitud->adoptante->nombre }}</td>
                            <td>
                                <span class="estado-badge {{ $solicitud->estado }}">
                                    {{ ucfirst($solicitud->estado) }}
                                </span>
                            </td>

                            <td>
                            {{ $solicitud->created_at->format('d/m/Y') }}
                        </td>

                        <td class="acciones">
                            @if($solicitud->estado === 'pendiente')
                                <button 
                                    wire:click="aprobarSolicitud({{ $solicitud->id }})"
                                    class="btn-success">
                                    Aprobar
                                </button>

                                <button 
                                    wire:click="rechazarSolicitud({{ $solicitud->id }})"
                                    class="btn-danger">
                                    Rechazar
                                </button>

                                @endif
                        </td>
                        </tr>

                    @empty

                        <tr>

                             <td colspan="5" class="empty-row">
                            No hay solicitudes registradas.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>



                       

                        