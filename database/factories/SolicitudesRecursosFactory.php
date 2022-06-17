<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SolicitudRecurso;

class SolicitudesRecursosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'peticion' => $this->faker->paragraph(2)
        ];
    }
    
    protected $model = SolicitudRecurso::class;
}
