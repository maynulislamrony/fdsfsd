<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'name' =>'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'), // password
            'status' => 1,
            'parmanent_address'=>'Chaiterpara, kaligonj, gazipur',
            'present_address'=>'As Above',
            'DOB'=>'01/01/2000',
            'gender'=>'Male',
            'mertal_satus'=>'Married',
            'nationality'=>'Bangladesh',
            'photo'=>'upload/5fc3341d9ad9b.png',
            
        ]);

        User::create([
            'name' =>'Nehal Ahmed',
            'email' => 'nehal@gmail.com',
            'password' => bcrypt('12345'), // password
            'status' => 1,
            'parmanent_address'=>'Chaiterpara, kaligonj, gazipur',
            'present_address'=>'As Above',
            'DOB'=>'01/01/2000',
            'gender'=>'Male',
            'mertal_satus'=>'Married',
            'nationality'=>'Bangladesh',
            'photo'=>'upload/nehal.JPG',
            
        ]);

        User::create([
            'name' =>'Sujan Miah',
            'email' => 'sujan@gmail.com',
            'password' => bcrypt('12345'), // password
            'status' => 1,
            'parmanent_address'=>'Chaiterpara, kaligonj, gazipur',
            'present_address'=>'As Above',
            'DOB'=>'01/01/2000',
            'gender'=>'Male',
            'mertal_satus'=>'Married',
            'nationality'=>'Bangladesh',
            'photo'=>'upload/sujan.jpg',
            
        ]);

        User::create([
            'name' =>'Rafsan',
            'email' => 'rafsan@gmail.com',
            'password' => bcrypt('12345'), // password
            'status' => 1,
            'parmanent_address'=>'Chaiterpara, kaligonj, gazipur',
            'present_address'=>'As Above',
            'DOB'=>'01/01/2000',
            'gender'=>'Male',
            'mertal_satus'=>'Married',
            'nationality'=>'Bangladesh',
            'photo'=>'upload/rafsan.jpg',
            
        ]);

        User::create([
            'name' =>'Roni',
            'email' => 'roni@gmail.com',
            'password' => bcrypt('12345'), // password
            'status' => 1,
            'parmanent_address'=>'Chaiterpara, kaligonj, gazipur',
            'present_address'=>'As Above',
            'DOB'=>'01/01/2000',
            'gender'=>'Male',
            'mertal_satus'=>'Married',
            'nationality'=>'Bangladesh',
            'photo'=>'upload/roni.png',
            
        ]);

        User::create([
            'name' =>'Mubarok',
            'email' => 'mubarok@gmail.com',
            'password' => bcrypt('12345'), // password
            'status' => 1,
            'parmanent_address'=>'Chaiterpara, kaligonj, gazipur',
            'present_address'=>'As Above',
            'DOB'=>'01/01/2000',
            'gender'=>'Male',
            'mertal_satus'=>'Married',
            'nationality'=>'Bangladesh',
            'photo'=>'upload/mubarok.png',
            
        ]);
    }
}
