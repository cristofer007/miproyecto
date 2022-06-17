<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Canal;
use App\Models\User;
use App\Models\Grupo;
use App\Models\Publicacion;

class PublicacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Canal::all() as $canal)
        {
            $grupo = $canal->grupo;
            $usuariosGrupo = $grupo->usuarios;
            
            foreach($usuariosGrupo as $usuarioGrupo){
                foreach($grupo->canales as $canal)
                {
                    Publicacion::factory()
                    ->count(2)
                    ->for($canal, 'canal')
                    ->for($usuarioGrupo, 'autor')
                    ->create();
                }
            }
        }
    }
}
