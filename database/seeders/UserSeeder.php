<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Tanveer Ahmad',
            'email' => 'tanveer.ahmad@gmail.com',
            'cnic'  =>  '31302-9433138-5',
            'cell'  => '',
            'img'  => '',
            'otp'  => '',
            'uvas_id'  => '',
            'user_type' => '1',
            'password' => Hash::make('1234'),
            ]);
        User::create([
            'name' => 'Enam Ul Haq',
            'email' => 'enamulhaq2013@gmail.com',
            'cnic'  =>  '31302-9433138-1',
            'cell'  => '',
            'img'  => '',
            'otp'  => '',
            'uvas_id'  => '',
            'user_type' => '2',
            'password' => Hash::make('1234'),
            ]);
        User::create([
            'name' => 'Shafiq Ahmad',
            'email' => 'shafiq@gmail.com',
            'cnic'  =>  '31302-9433138-8',
            'cell'  => '',
            'img'  => '',
            'otp'  => '',
            'uvas_id'  => '',
            'user_type' => '3',
            'password' => Hash::make('1234'),
                ]);
    }
}
