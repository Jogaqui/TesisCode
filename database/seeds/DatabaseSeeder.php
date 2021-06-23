<?php

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
        $this -> call(UserSeeder::class);
        $this -> call(PublicacionSeeder::class);
        $this -> call(EtiquetaSeeder::class);
        $this -> call(ContactanosSeeder::class);
        $this -> call(UnidadSeeder::class);
        $this -> call(TrabajadorSeeder::class);
    }
}
