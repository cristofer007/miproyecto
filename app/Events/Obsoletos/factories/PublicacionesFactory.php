<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\Publicacion;
use app\Models\User;
use app\Models\Canal;

class PublicacionesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'asunto' => $this->faker->word(),
            'texto' => $this->faker->paragraph(2),
            'id_autor' => User::factory()
            //'id_canal' => Canal::factory()
        ];
    }
    
    protected $model = Publicacion::class;
}
