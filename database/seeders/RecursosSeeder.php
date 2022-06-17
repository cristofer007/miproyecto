<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Grupo;
use App\Models\Recurso;

class RecursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grupos = Grupo::all();
        
        foreach($grupos as $grupo)
        {
            $usuariosGrupo = $grupo->usuarios;
            
            foreach($usuariosGrupo as $usuarioGrupo)
            {
                Recurso::factory()
                        ->for($grupo, 'grupo')
                        ->for($usuarioGrupo, 'dueno')
                        ->create();
            }
        }
    }
}
