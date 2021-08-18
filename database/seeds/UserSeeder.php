<?php

use Illuminate\Database\Seeder;
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
          'usu_nombres' => 'CESAR AUGUSTO',
          'usu_apepaterno' => 'URBINA',
          'usu_apematerno' => 'NARRO',
          'usu_email' => 'curbina@unitru.edu.pe',
          'usu_login' => 'curbina@unitru.edu.pe',
          'usu_dni' => '74660603',
          'password' => Hash::make('12345678'),
          'usu_rol' => 1,
        ]);
    }
}
