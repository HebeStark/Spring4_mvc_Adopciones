<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Animal;
use App\Models\SolicitudAdopcion;


class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard', [
           'animalesDisponibles' => Animal::where('estado', 'disponible')->count(),
           'animalesAdoptados' => Animal::where('estado', 'adoptado')->count(),
            'solicitudesPendientes' => SolicitudAdopcion::where('estado', 'pendiente')->count(),
        ]);
    }
}
