<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            "name" => "White Rice & Beans",
            "description" => "Nigerian Rice and Beans - Rice and Beans is a staple in many cultures around the world and Nigeria is not an exception. Though the classic Nigerian Rice and Beans is not eaten plain, it's usually served with different sauces and stews.",
            "price" => 500,
            "image" => "https://res.cloudinary.com/lexemmy/image/upload/v1648224955/big%20taste/Rectangle_78_8_qwcq30.png",
            "category_id" => Category::pluck('id')[0]
        ]);

        Product::create([
            "name" => "Banga Rice",
            "description" => "Banga Rice is a traditional Nigerian food prepared with palm fruit like in palm nut soup. The dish is common among the Urhobo people of southern Nigeria...",
            "price" => 400,
            "image" => "https://res.cloudinary.com/lexemmy/image/upload/v1648224958/big%20taste/Rectangle_78_6_z2sste.png",
            "category_id" => Category::pluck('id')[0]
        ]);

        Product::create([
            "name" => "Ofade Rice",
            "description" => "Ofada rice is a popular Nigerian rice variety. It is also called Unpolished rice as it is rice in it's natural state and without genetic modification. It is very healthy and much more healthier than white rice and is identified as Brown rice.",
            "price" => 400,
            "image" => "https://res.cloudinary.com/lexemmy/image/upload/v1648224951/big%20taste/Rectangle_78_5_v5udm3.png",
            "category_id" => Category::pluck('id')[0]
        ]);

        Product::create([
            "name" => "Egusi",
            "description" => "Egusi Soup is a finger-licking good Nigerian soup made with a white variety of pumpkin seeds. It is spicy, nutty with exotic African flavors. It is a classic soup enjoyed in various forms across the country.",
            "price" => 400,
            "image" => "https://res.cloudinary.com/lexemmy/image/upload/v1648225949/big%20taste/Rectangle_78_7_zafwvu.png",
            "category_id" => Category::pluck('id')[2]
        ]);

        Product::create([
            "name" => "Bitterleaf",
            "description" => "Bitterleaf soup is one of the most traditional soups in Nigeria. It is native to the Igbos of Eastern Nigeria and most Igbos will tell you that this is their favourite soup in the world.",
            "price" => 400,
            "image" => "https://res.cloudinary.com/lexemmy/image/upload/v1648225933/big%20taste/Rectangle_78_6_hkvg3i.png",
            "category_id" => Category::pluck('id')[2]
        ]);

        Product::create([
            "name" => "Beaf",
            "price" => 400,
            "category_id" => Category::pluck('id')[6]
        ]);

        Product::create([
            "name" => "Chicken",
            "price" => 1600,
            "category_id" => Category::pluck('id')[6]
        ]);

        Product::create([
            "name" => "Cow Leg",
            "price" => 400,
            "category_id" => Category::pluck('id')[6]
        ]);

        Product::create([
            "name" => "Snail",
            "price" => 1600,
            "category_id" => Category::pluck('id')[6]
        ]);

        Product::create([
            "name" => "Turkey",
            "price" => 400,
            "category_id" => Category::pluck('id')[6]
        ]);

        Product::create([
            "name" => "Sauced Kpomo",
            "price" => 1600,
            "category_id" => Category::pluck('id')[6]
        ]);

        Product::create([
            "name" => "Eba",
            "price" => 1600,
            "category_id" => Category::pluck('id')[8]
        ]);
        Product::create([
            "name" => "Wheat",
            "price" => 1600,
            "category_id" => Category::pluck('id')[8]
        ]);
        Product::create([
            "name" => "Semo",
            "price" => 1600,
            "category_id" => Category::pluck('id')[8]
        ]);

        Product::create([
            "name" => "Amala",
            "price" => 1600,
            "category_id" => Category::pluck('id')[8]
        ]);

        Product::create([
            "name" => "Starch",
            "price" => 1600,
            "category_id" => Category::pluck('id')[8]
        ]);

        Product::create([
            "name" => "Poundo Yam",
            "price" => 1600,
            "category_id" => Category::pluck('id')[8]
        ]);
        Product::create([
            "name" => "Yam",
            "price" => 1600,
            "category_id" => Category::pluck('id')[7]
        ]);
        Product::create([
            "name" => "moi moi",
            "price" => 1600,
            "category_id" => Category::pluck('id')[7]
        ]);

        Product::create([
            "name" => "Agidi",
            "price" => 1600,
            "category_id" => Category::pluck('id')[7]
        ]);
    }
}
