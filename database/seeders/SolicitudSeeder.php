<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Animal;
use App\Models\Adoptante;
use App\Models\SolicitudAdopcion;

class SolicitudSeeder extends Seeder
{
     public function run(): void
    {
        $animal = Animal::first();

        if ($animal) {
            $adoptante = Adoptante::create([
                'nombre' => 'Laura Gomez',
                'email' => 'lau.G@gmail.com',
                'telefono' => '654346598',
            ]);
            SolicitudAdopcion::create([
                'animal_id' => $animal->id,
                'adoptante_id' => $adoptante->id,
                'estado' => 'pendiente',
            ]);
        
        }
    }
    
}
