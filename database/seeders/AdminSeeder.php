<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('admins')->insert([
           //  user
           [
            'name'=> 'Admin Puja',
            'email'=> 'admin@gmail.com',
            'password'=>Hash::make('11111111'),

        ],
           
        
         ]);
    }
}
