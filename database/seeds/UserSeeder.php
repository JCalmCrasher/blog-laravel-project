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
            'firstname' =>  'Joshua',
            'lastname'  =>  'Osaige',
            'username'  =>  'joshua',
            'email'     =>  'josh001pro@gmail.com',
            'password' =>  Hash::make('123456'),
            'remember_token' =>  "Hello",
        ]);
    }
}
