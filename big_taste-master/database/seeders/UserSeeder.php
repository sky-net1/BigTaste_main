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
            'name'=> 'jon doe',
            'email'=> 'jon@mail.com',
            'phone_number'=> '23456789',
            'address'=> 'Lagos, NIgeria',
            'password'=> Hash::make('1234')
        ]);
    }
}
