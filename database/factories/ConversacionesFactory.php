<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Conversacion;

class ConversacionesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'interlocutorx' => null,
            'interlocutory' => null,
            'nivelConsideracion' => 2
        ];
    }
    
    protected $model = Conversacion::class;
}
