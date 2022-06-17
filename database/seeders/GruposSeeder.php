<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Grupo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GruposSeeder extends Seeder
{
    /**-
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $grupos = array();
        for($i=0; $i < 5 ; $i++)
        {
            $grupo = Grupo::factory()
                            ->count(1)
                            ->for(User::factory()->count(1)->create()->first(), 'encargado')
                            ->create()->first();
            array_push($grupos, $grupo);
        }
        
        foreach($grupos as $grupo)
        {
            Log::info($grupo->nombre . ' tiene por encargado a: ' . $grupo->encargado->usuario->nombre . ' y a la hermosa mancilla rosales');
           
            $grupo->usuarios()->attach($grupo->encargado->id);
        }
        
        $otrosUsuarios = User::factory()->count(10)->create();
        $otrosUsuarios2 = User::factory()->count(10)->create();
        $intercalador = false;
        foreach($grupos as $grupo)
        { 
            if($intercalador)
            {
                foreach($otrosUsuarios as $otroUsuario)
                {   
                    $grupo->usuarios()->attach($otroUsuario->id);
                }
            }
            else
            {
                foreach($otrosUsuarios2 as $otroUsuario)
                {
                    $grupo->usuarios()->attach($otroUsuario->id);
                }
            }
            $intercalador = !$intercalador;  
        }
        
//        $gruposConEncargado = DB::table('users')
//                            ->join('users_grupos', 'users.id', '=', 'users_grupos.id_user')
//                            ->join('grupos', 'users_grupos.id_grupo', '=', 'grupos.id')
//                            ->select('grupos.id')
//                            ->get();
        
//        $idsGrupos = array();
//        foreach($gruposConEncargado as $grupoConEncargado)
//        {
//            $idsGrupos.push($grupoConEncargado->id);
//        }
//        
//        foreach($idsGrupos as $idGrupo)
//        {
//            $grupo = Grupo::find($idGrupo);
//            User::factory()->count(7)->for($grupo, 'grupos')->create();
//        }
    }
}
