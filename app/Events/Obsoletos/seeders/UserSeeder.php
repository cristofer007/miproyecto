<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Usuario;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    //use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        Role::create(['name' => 'administrador']); 
        Role::create(['name' => 'encargadogrupo']);
        Role::create(['name' => 'funcionario']);
        
        $this->crearAdministrador();
        $this->crearEncargado();
        $this->crearFuncionario();
        
    }
    
    private function crearAdministrador()
    {
        $administrador = User::create([
                        'id' => 100,
			'email' => 'd.e.usuario.22@gmail.com',
			'email_verified_at' => date("Y-m-d H:i:s"),
			'password' => Hash::make('qwerty'),
                        'id_usuario' => 100
		]);
        
        $administrador->assignRole('administrador');
        return;
    }
    
    private function crearEncargado()
    {
        $encargadoGrupo = User::create([
                        'id' => 99,
                       'email' => 'riflemanrv1@gmail.com',
                       'email_verified_at' => date("Y-m-d H:i:s"),
                       'password' => Hash::make('usuario'),
                       'id_usuario' => 99
               ]);
        
        $encargadoGrupo->assignRole('encargadogrupo');
        return;
    }
    
    private function crearFuncionario()
    {
        $funcionario = User::create([
                        'id' => 98,
			'email' => 'correousopucv@gmail.com',
			'email_verified_at' => date("Y-m-d H:i:s"),
			'password' => Hash::make('usuario'),
                        'id_usuario' => 98
		]);
        
        $funcionario->assignRole('funcionario');
        return;
    }
    
  
    /*
    private function crearFuncionarioAleatorio()
    {
        $funcionario = User::create([
			'email' => 'correousopucv@gmail.com',
			'email_verified_at' => date("Y-m-d H:i:s"),
			'password' => Hash::make('usuario'),
                        'id_usuario' => 
		]);
        
        $funcionario->assignRole('funcionario');
        return;
    }*/
}
