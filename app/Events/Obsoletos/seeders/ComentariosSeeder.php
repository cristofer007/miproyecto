<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comentario;
use App\Models\Publicacion;
use App\Models\Canal;
use App\Models\User;

class ComentariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publicaciones = Publicacion::all();
        
        foreach($publicaciones as $publicacion)
        {
            $canalPublicacion = $publicacion->canal;
            $grupoPublicacion = $canalPublicacion->grupo;
            $usuariosGrupo = $grupoPublicacion->usuarios;
            
            foreach($usuariosGrupo as $usuarioGrupo)
            {
                Comentario::factory()
                        ->for($usuarioGrupo, 'autor')
                        ->for($publicacion, 'publicacion')
                        ->create();
            }
        }
        
    }
}
