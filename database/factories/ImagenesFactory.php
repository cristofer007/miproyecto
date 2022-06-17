<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Imagen;
use App\Models\Publicacion;

class ImagenesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'imagen' => $this->faker->image(null, 360, 360, 'animals', true),
            'id_publicacion' => Publicacion::factory()
        ];
    }
    
    protected $model = Imagen::class;
}
