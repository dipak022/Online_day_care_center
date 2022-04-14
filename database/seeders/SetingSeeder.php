<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('settings')->insert([
           
            
            'email'=>'problem.solve@gmail.com',
            'phone'=>'0162564554',
            'facebookb_link'=>'https://facebook.com/',
            'twiter_link'=>'https://facebook.com/',
            'linkdin_link'=>'https://facebook.com/',
            'instragram_link'=>'https://facebook.com/',
            ]);


            
    }
}
