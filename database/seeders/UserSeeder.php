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
            'email' => 'rodrigo.s.ferreira96@gmail.com',
            'password' => Hash::make('1234'),
        ]);
    }
}
