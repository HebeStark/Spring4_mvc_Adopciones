<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Animal;
use Livewire\Attributes\Layout;
use Psy\Util\Str;
use Stringable;

#[Layout('layouts.app')]

class AnimalEdit extends Component
{

    public Animal $animal;
    public string $nombre = '';
    public string $tipo = '';
    public int $edad = 0;
    public string $estado = 'disponible';

    public function mount(Animal $animal)
    {
        $this->animal = $animal;
        $this->nombre = $animal->nombre;
        $this->tipo = $animal->tipo;
        $this->edad = $animal->edad;
        $this->estado = $animal->estado;
    }

    protected  function rules(): array
    {
        return [
            'nombre' => 'required|string|min:2',
            'tipo' => 'required|in:perro,gato',
            'edad' => 'required|integer|min:0',
            'estado' => 'required|in:disponible,adoptado',
        ];
    }

    public function updateAnimal()
    {
        $this->validate();
        $this->animal->update([
            'nombre' => $this->nombre,
            'tipo' => $this->tipo,
            'edad' => $this->edad,
            'estado' => $this->estado,
        ]);       

        session()->flash('success', 'Animal actualizado correctamente.');

        return redirect()->route('animales.index');
    }

    public function render()
    {
        return view('livewire.animal-edit');
    }
}
