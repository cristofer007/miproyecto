<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grupo;
use App\Models\Canal;

class CanalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Grupo::all() as $grupo)
        {
            Canal::factory()
                    ->count(3)
                    ->for($grupo, 'grupo')
                    ->create();
        };
    }
}
