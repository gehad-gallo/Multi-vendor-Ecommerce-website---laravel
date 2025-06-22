<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       /* DB::table('users')->insert([
            [
                'name' => 'admin user',
                'user_name' => 'admin_user',
                'email' => 'admin@gmail.com',
                'status' => 'active',
                'password' => bcrypt('12345678')
            ],[
                'name' => 'vendor user',
                'user_name' => 'vendor_user',
                'email' => 'vendor@gmail.com',
                'status' => 'active',
                'password' => bcrypt('12345678')
            ],[
                'name' => 'user',
                'user_name' => 'user',
                'email' => 'user@gmail.com',
                'status' => 'active',
                'password' => bcrypt('12345678')
            ]
        ]);

        instead of this i used factory to make fake users from user/vendor type 
        */
    }
}
