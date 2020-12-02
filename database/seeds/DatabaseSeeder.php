<?php

use App\User;
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
        // User::insert([
        //     'name' => 'Admin User',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('secret'),
        //     // 'password' => 'secret',            
        //     'user_type' => 10,
        // ]);

        User::insert([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'paterno' => 'Couther',            
            'user_type' => 3,
        ]);
    }
}
