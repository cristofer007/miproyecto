<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permiso;
use App\Models\User;
use App\Models\Carpeta;
use Illuminate\Support\Facades\Log;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $funcionarios = User::doesntHave('gruposACargo')->get();
        foreach(Carpeta::all() as $carpeta)
        {
            $grupoCarpeta = $carpeta->grupo;
            $usuariosGrupo = $grupoCarpeta->usuarios;
            $funcionariosGrupo = $usuariosGrupo->intersect($funcionarios);
            
            foreach($funcionariosGrupo as $funcionarioGrupo)
            {
                Permiso::factory()
                        ->for($funcionarioGrupo, 'usuario')
                        ->for($carpeta, 'carpeta')
                        ->create();
            }
        }    
        
    }
}
