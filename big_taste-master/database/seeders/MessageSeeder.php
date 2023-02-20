<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::create([
            'user_id' => User::pluck('id')[0],
            'title' => 'Big Taste Promotions',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,'
        ]);
        Message::create([
            'user_id' => User::pluck('id')[0],
            'title' => 'Big Taste Promotions',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,'
        ]);
        Message::create([
            'user_id' => User::pluck('id')[0],
            'title' => 'Big Taste Promotions',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,'
        ]);
        Message::create([
            'user_id' => User::pluck('id')[0],
            'title' => 'Big Taste Promotions',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,'
        ]);
    }
}
