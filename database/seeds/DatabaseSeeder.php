<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jesus Fco',
            'email' => 'jfcr@live.com',
            'password' => bcrypt('secret'),
            // 'password' => 'secret',
            'paterno' => 'Rodriguez',            
            'user_type' => 10,
        ]);

        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'paterno' => 'Couther',            
            'user_type' => 1,
        ]);
    }
}
