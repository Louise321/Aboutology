<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* DB::table('rols')->insert([
            'rol'   => 'USERS',
        ]);
        DB::table('rols')->insert([
            'rol'   => 'ADMINS',
        ]); */

        DB::table('users')->insert([
            'name'      => 'Juan',
            'email'     => 'machuca@gmail.com',
            'password'  => Hash::make('Machuca12'),
        ]);

        DB::table('admin')->insert([
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'password'  => Hash::make('Machuca12'),
        ]);
    }
}
