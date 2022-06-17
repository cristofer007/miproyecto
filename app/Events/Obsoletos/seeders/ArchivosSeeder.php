<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Archivo;
use App\Models\Carpeta;

class ArchivosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carpetas = Carpeta::all();
        
        foreach($carpetas as $carpeta)
        {
            $usuariosGrupo = $carpeta->grupo->usuarios;
            
            foreach($usuariosGrupo as $usuarioGrupo){
                Archivo::factory()
                        ->for($carpeta, 'carpeta')
                        ->for($usuarioGrupo, 'subidor')
                        ->count(3)
                        ->create();
            }
        }
        
    }
}
