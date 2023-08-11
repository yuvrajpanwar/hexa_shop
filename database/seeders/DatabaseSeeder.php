<?php

namespace Database\Seeders;

use App\Models\User;
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
        // \App\Models\User::factory(10)->create();


        User::create([
           'name'=>'superman',
           'email'=>'superadmin@gmail.com',
           'password' => bcrypt('asdfghjkl'),
           'admin_type' => 'super_admin' 
        ]);

        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password' => bcrypt('asdfghjkl'),
            'admin_type' => 'admin' 
         ]);


    }
}
