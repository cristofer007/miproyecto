<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grupo;
use App\Models\Carpeta;

class CarpetasSeeder extends Seeder
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
            Carpeta::factory()
                    ->for($grupo, 'grupo')
                    ->count(4)
                    ->create();
        }
    }
}
