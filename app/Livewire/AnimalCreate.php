<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Animal;

#[Layout('layouts.app')]
class AnimalCreate extends Component
{
    public string $nombre = '';
    public string $tipo = '';
    public int $edad = 0;
    public string $estado = 'disponible';
    public string $foto = '';

    protected function rules()
    {        
        return [
            'nombre' => 'required|string|min:2',
            'tipo' => 'required|in:perro,gato',
            'edad' => 'required|integer|min:0|max:30',
            'estado' => 'required|in:disponible,adoptado',
            'foto' => 'nullable|url',
            ];
    }
    
    public function save()
    {
        $this->validate();  

        Animal::create([
            'nombre' => $this->nombre,
            'tipo' => $this->tipo,
            'edad' => $this->edad,
            'estado' => $this->estado,
            'foto' => $this->foto,
        ]);

        session()->flash('success', 'Animal creado exitosamente.');
       
        return redirect()->route('animales.index');
    }

    public function render()
    {
        return view('livewire.animal-create');
    }

 }
        