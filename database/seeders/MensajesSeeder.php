<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Conversacion;
use App\Models\Mensaje;
use Illuminate\Database\Eloquent\Factories\Sequence;

class MensajesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conversaciones = Conversacion::all();
        
        foreach($conversaciones as $conversacion)
        {
            Mensaje::factory()
                    ->count(10)
                    ->state(new Sequence(
                        ['id_autor' => $conversacion->usuario1->id],
                        ['id_autor' => $conversacion->usuario2->id]
                    ))
                    ->for($conversacion, 'conversacion')
                    ->create();
        }
        
    }
}
