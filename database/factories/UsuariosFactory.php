<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\Usuario;


class UsuariosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'segundo_apellido' => $this->faker->lastName(),
            'telefono' => $this->faker->unique()->e164PhoneNumber()
        ];
    }
    
    protected $model = Usuario::class;
}
