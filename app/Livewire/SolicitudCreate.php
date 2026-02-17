<?php

namespace App\Livewire;

use App\Models\SolicitudAdopcion;
use Livewire\Component;
use App\Models\Animal;
use App\Models\Adoptante;


class SolicitudCreate extends Component
{
    public $animal;
    public $nombre;
    public $email;
    public $telefono;   

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'telefono' => 'required|string|max:20',
    ];

    public function mount(Animal $animal)
    {
        $this->animal = $animal;
    }

    public function save()
    {
        $this->validate();

        $adoptante = Adoptante::firstOrCreate(
            ['email' => $this->email],
            ['nombre' => $this->nombre, 
            'telefono' => $this->telefono]
        );
        $exists = SolicitudAdopcion::where('animal_id', $this-> animal->id)
        ->where('adoptante_id', $adoptante->id)
        ->whereIn('estado', ['pendiente', 'aprobada'])
        ->exists();

        if ($exists){
            return redirect()
            ->route('animales.index')
            ->with('error', 'Ya has enviado una solicitud para este animal.');
           
        }        

        SolicitudAdopcion::create([
            'animal_id' => $this->animal->id,
            'adoptante_id' => $adoptante->id,
            'estado' => 'pendiente',
        ]);

        return redirect()
        ->route('animales.index')
        ->with('success', 'Solicitud de adopción enviada correctamente.');

    }
    public function render()
    {
        return view('livewire.solicitud-create');
    }
}
