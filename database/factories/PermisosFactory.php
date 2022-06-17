<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\User;
use app\Models\Carpeta;
use app\Models\Permiso;

class PermisosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'permiso_descarga' => true,
            'permiso_subida' => true
//            'id_carpeta' => Carpeta::factory()
        ];
    }
    
    protected $model = Permiso::class;
}
