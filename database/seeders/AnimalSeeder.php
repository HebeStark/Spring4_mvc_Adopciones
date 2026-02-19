<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Animal;

class AnimalSeeder extends Seeder
{
   
    public function run(): void
    {
       Animal::factory(4)->create();
       Animal::factory(2)->cachorro()->create();
    }
}
