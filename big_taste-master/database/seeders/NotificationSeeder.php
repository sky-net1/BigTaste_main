<?php

namespace Database\Seeders;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Notification::create([
            'user_id' => User::pluck('id')[0],
            'title' => 'Your orders has been picked up',
        ]);
        Notification::create([
            'user_id' => User::pluck('id')[0],
            'title' => 'Your orders has been picked up',
        ]);
        Notification::create([
            'user_id' => User::pluck('id')[0],
            'title' => 'Your orders has been picked up',
        ]);
        Notification::create([
            'user_id' => User::pluck('id')[0],
            'title' => 'Your orders has been picked up',
        ]);
        Notification::create([
            'user_id' => User::pluck('id')[0],
            'title' => 'Your orders has been picked up',
        ]);
    }
}
