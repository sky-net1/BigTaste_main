<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            "name" => "Rice",
            "image" => "https://res.cloudinary.com/lexemmy/image/upload/v1648197374/big%20taste/rice__qguuam.png",
        ]);
        Category::create([
            "name" => "soup and swallow",
            "image" => "https://res.cloudinary.com/lexemmy/image/upload/v1648197376/big%20taste/soup_and_swallow_lghhjw.png",
        ]);
        Category::create([
            "name" => "meat and sauce",
            "image" => "https://res.cloudinary.com/lexemmy/image/upload/v1648197377/big%20taste/meat_sauce_dvri4c.png",
        ]);
        Category::create([
            "name" => "pepper soup",
            "image" => "https://res.cloudinary.com/lexemmy/image/upload/v1648197376/big%20taste/pepper_soup_q8vyov.png",
        ]);
        Category::create([
            "name" => "yam and porridge",
            "image" => "https://res.cloudinary.com/lexemmy/image/upload/v1648197375/big%20taste/yam_and_porridge_sxcjjj.png",
        ]);
        Category::create([
            "name" => "beverage and drink",
            "image" => "https://res.cloudinary.com/lexemmy/image/upload/v1648197377/big%20taste/beverage_and_drink_qgaltl.png",
        ]);
        Category::create([
            "name" => "meat"
        ]);
        Category::create([
            "name" => "protein"
        ]);
        Category::create([
            "name" => "swallow"
        ]);
    }
}
