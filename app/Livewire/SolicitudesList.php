<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\SolicitudAdopcion;

class SolicitudesList extends Component
{
    public function aprobarSolicitud($id)
    {
        /**@var User|null $user */
        $user = Auth::user();
        if (!$user || !$user->isAdmin()) {
            abort(403, 'Acceso solo para administradores.');
        }
        $solicitud = SolicitudAdopcion::findOrFail($id);
        $solicitud->aprobar();

        session()->flash('success', 'Solicitud aprobada correctamente.');
    }
       public function rechazarSolicitud($id)
    {
        /**@var User|null $user */
        $user = Auth::user();
        if (!$user || !$user->isAdmin()) {
            abort(403);
    }
        $solicitud = SolicitudAdopcion::findOrFail($id);
        $solicitud->rechazar();

        session()->flash('success', 'Solicitud rechazada.');
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
