<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Archivo;
use App\Models\Carpeta;
use App\Models\User;

class ArchivosFactory extends Factory
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
        ];
    }
    
    protected $model = Archivo::class;
}
