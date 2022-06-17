<?php

namespace database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Carpeta;
use App\Models\Grupo;

class CarpetasFactory extends Factory
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
            'privada' => true,
//            'id_grupo' => Grupo::factory(),
            'id_supercarpeta' => null
        ];
    }
    
    protected $model = Carpeta::class;
}
