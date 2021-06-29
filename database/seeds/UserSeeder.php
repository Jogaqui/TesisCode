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
            'name' => 'Kevin Juárez',
            'email' => 'kevinkjjuarez@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => 'José Mantilla',
            'email' => 'jmantillas@unitru.edu.pe',
            'password' => Hash::make('12345678'),
        ]);
    }
}
