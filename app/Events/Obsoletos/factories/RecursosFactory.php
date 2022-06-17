<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\Recurso;
use app\Models\Grupo;
use app\Models\User;

class RecursosFactory extends Factory
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
            'descripcion' => $this->faker->paragraph(2),
            'id_estado' => '1',
            'imagen' => null
        ];
    }
    
    protected $model = Recurso::class;
}
