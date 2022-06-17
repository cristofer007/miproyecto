<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            GruposSeeder::class,
            CanalesSeeder::class,
            PublicacionesSeeder::class,
            ComentariosSeeder::class,
            RecursosSeeder::class,
            CarpetasSeeder::class,
            ArchivosSeeder::class,
            PermisosSeeder::class,
            ConversacionesSeeder::class,
            MensajesSeeder::class,
            RolesSeeder::class
        ]);
    }
}
