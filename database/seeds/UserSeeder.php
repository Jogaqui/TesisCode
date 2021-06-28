<?php

// use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'César Urbina',
            'email' => 'csaun_98@hotmail.com',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
<<<<<<< HEAD
            'name' => 'José Mantilla',
            'email' => 'jmantillas@unitru.edu.pe',
=======
            'name' => 'Kevin Juárez',
            'email' => 'kevinkjjuarez@gmail.com',
>>>>>>> 68768a9de45823baf8e0b531ab74a309efe2b957
            'password' => Hash::make('12345678'),
        ]);
    }
}
