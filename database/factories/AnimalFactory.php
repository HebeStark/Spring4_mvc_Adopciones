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
        return [
            'nombre' => $this->faker->firstName(),
            'tipo' => $this->faker->randomElement(['perro', 'gato', 'Bird']),
            'edad' => $this->faker->numberBetween(1, 15),
            'estado' => 'disponible',
        ];
    }

            
  
}
