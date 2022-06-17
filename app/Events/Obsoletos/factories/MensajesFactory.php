<?php

namespace Database\Factories;

use App\Models\Mensaje;
use App\Models\User;
use App\Models\Conversacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class MensajesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'texto' => $this->faker->paragraph(1),
            'id_autor' => null,
            'id_conversacion' => null
        ];
    }
    
    protected $model = Mensaje::class;
}
