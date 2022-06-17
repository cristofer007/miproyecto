<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Grupo;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $funcionarios = User::all();
        
        foreach($funcionarios as $funcionario)
        {
            $funcionario->assignRole('funcionario');
        }
            
        $grupos = Grupo::all();
        
        foreach($grupos as $grupo)
        {
            $encargadoGrupo = $grupo->encargado;
            $encargadoGrupo->assignRole('encargadogrupo');
        }
        
        $administrador = User::find(100);
        $administrador->removeRole('funcionario');
    }
}
