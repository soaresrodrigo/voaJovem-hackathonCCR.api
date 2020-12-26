<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Rodrigo Soares',
            'email' => 'rodrigosoares@voajovem.com',
            'password' => Hash::make('1234'),
        ]);
        DB::table('users')->insert([
            'name' => 'Rodrigo Silva',
            'email' => 'rodrigosilva@voajovem.com',
            'password' => Hash::make('4321'),
        ]);
        DB::table('users')->insert([
            'name' => 'Bruno Araujo',
            'email' => 'brunoaraujo@voajovem.com',
            'password' => Hash::make('eusouvacilao'),
        ]);
    }
}
