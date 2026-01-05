<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Animal;
use App\Models\Adoptante;
use App\Models\SolicitudAdopcion;

class SolicitudCreate extends Component
{
    public $animal_id;
    public $nombre;
    public $email;
    public $telefono;

    protected $rules=[
        'animal_id' => 'required|exists:animales,id',
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'telefono' => 'required|string|max:20',
    ];

    public function save()
    {
        $this->validate();

        $adoptante = Adoptante::firstOrCreate([           
            'email' => $this->email],
        [
            'nombre' => $this->nombre,
            'telefono' => $this->telefono,
        ]);

        SolicitudAdopcion::create([
            'animal_id' => $this->animal_id,
            'adoptante_id' => $adoptante->id,
            'estado' => 'pendiente',
        ]);

        session()->flash('success', 'Solicitud de adopción enviada correctamente.');

        $this->reset(['animal_id','nombre', 'email', 'telefono']);
    }

    public function render()
    {
        return view('livewire.solicitud-create', [
            'animales' => Animal::where('estado', 'disponible')->get(),
        ]);
    }
}
