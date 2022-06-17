<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Conversacion;
use App\Models\Grupo;


class ConversacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     
     * @return void
     */
    public function run()
    {
        $usuarios1 = Grupo::find(1)->usuarios;
        $usuarios2 = Grupo::find(2)->usuarios;
        
        foreach($usuarios1 as $usuario1)
        {
            
            foreach($usuarios2 as $usuario2)
            {
                Conversacion::factory()
                        ->for($usuario2, 'usuario2')
                        ->for($usuario1, 'usuario1')
                        ->create();
            }
        }
    }
}
