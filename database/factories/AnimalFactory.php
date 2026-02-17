<?php

namespace Database\Factories;
use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{   
    protected $model = Animal::class;

    public function definition(): array
    {
         $imagenes = [
        'images/animales/luna.jpg',
        'images/animales/max.jpg',
        'images/animales/nala.jpg',
        'images/animales/rocky.jpg',
        'images/animales/milo.jpg',
        'images/animales/bella.jpg',
    ];
        return [
        'nombre' => $this->faker->firstName(),
        'tipo' => $this->faker->randomElement(['perro', 'gato']),
        'edad' => $this->faker->numberBetween(1, 15),
        'estado' => 'disponible',
        'foto' => $this->faker->randomElement($imagenes),
    ];
    
    }

    public function cachorro(): static
    {
        return $this->state(fn (array $attributes) => [
            'edad' => $this->faker->numberBetween(1, 2), 
        ]);         
   
    }

            
  
}
