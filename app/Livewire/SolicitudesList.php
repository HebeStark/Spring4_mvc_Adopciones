<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SolicitudAdopcion;

class SolicitudesList extends Component
{
    public function aprobarSolicitud($id)
    {
        $solicitud = SolicitudAdopcion::findOrFail($id);
          if ($solicitud->estado !== 'pendiente') {
              return;
          }
          $solicitud->aprobar();
          session()->flash('success', 'Solicitud aprobada correctamente.');
    }
    public function rechazarSolicitud($id)
    {
        $solicitud = SolicitudAdopcion::findOrFail($id);
          if ($solicitud->estado !== 'pendiente') {
              return;
          }
          $solicitud->rechazar();
          $solicitud->save();
          session()->flash('success', 'Solicitud rechazada correctamente.');
    }
    public function render()
    {
        return view('livewire.solicitudes-list', [
            'solicitudes' => SolicitudAdopcion::with(['animal', 'adoptante'])
            ->orderBy('created_at', 'desc')
            ->get(),
        ]);
    }
}
   