<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\EstadoRecurso;

class EstadosRecursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'estado' => 'disponible'
        ];
    }
    
    protected $model = EstadoRecurso::class;
}
