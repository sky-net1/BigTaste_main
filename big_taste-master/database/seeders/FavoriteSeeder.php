<?php

namespace Database\Seeders;

use App\Models\Favorite;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Favorite::create([
            'user_id' => User::pluck('id')[0],
            'product_id' => Product::pluck('id')[0]
        ]);

        Favorite::create([
            'user_id' => User::pluck('id')[0],
            'product_id' => Product::pluck('id')[1]
        ]);

        Favorite::create([
            'user_id' => User::pluck('id')[0],
            'product_id' => Product::pluck('id')[2]
        ]);
    }
}
