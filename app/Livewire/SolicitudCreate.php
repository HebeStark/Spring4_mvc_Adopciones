<?php

namespace App\Livewire;

use App\Models\SolicitudAdopcion;
use Livewire\Component;
use App\Models\Animal;
use App\Models\Adoptante;


class SolicitudCreate extends Component
{

    public $animal_id;
    public $nombre;
    public $email;
    public $telefono;
    public $animales;

    protected $rules = [
        'animal_id' => 'required|exists:animales,id',
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'telefono' => 'nullable|string|max:20',
    ];

    public function mount()
    {
        $this->animales = Animal::where('estado','disponible')->get();
    }

    public function save()
    {
        $this->validate();

        $adoptante = Adoptante::firstOrCreate(
            ['email' => $this->email],
            ['nombre' => $this->nombre, 
            'telefono' => $this->telefono]
        );
        $existe = SolicitudAdopcion::where('animal_id', $this->animal_id)
        ->where('adoptante_id', $adoptante->id)
        ->whereIn('estado', ['pendiente', 'aprobada'])
        ->existe();

        if ($existe){
            session()->flash('error', 'Ya has enviado una solicitud para este animal.');
            return;
        }        

        SolicitudAdopcion::create([
            'animal_id' => $this->animal_id,
            'adoptante_id' => $adoptante->id,
            'estado' => 'pendiente',
        ]);

        session()->flash('success', 'Solicitud de adopción enviada correctamente.');

        $this->reset(['animal_id', 'nombre', 'email', 'telefono']);

    }
    public function render()
    {
        return view('livewire.solicitud-create');
    }
}
