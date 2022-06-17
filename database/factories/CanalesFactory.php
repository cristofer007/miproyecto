<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Canal;
use App\Models\Grupo;

class CanalesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word(),
            'descripcion' => $this->faker->paragraph(2)
            //'id_grupo' => Grupo::factory()
        ];
    }
    
    protected $model = Canal::class;
}
