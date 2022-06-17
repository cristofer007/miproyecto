<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\Comentario;
use app\Models\User;
use app\Models\Publicacion;

class ComentariosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'texto' => $this->faker->word(),
            'imagen' => null,
            'id_user' => User::factory(),
            //'id_publicacion' => Publicacion::factory(),
            'imagen' => null
        ];
    }
    
    protected $model = Comentario::class;
}
