<?php

use App\User;
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
            'firstname' =>  'Emmanuel',
            'lastname'  =>  'Asare',
            'username'  =>  'emma',
            'email'     =>  'emac@gmail.com',
            'password' =>  Hash::make('123456'),
            'remember_token' =>  "Hello",
        ]);
    }
}