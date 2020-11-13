<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i <= 50; $i++) {
            $name = $faker->name;
            \App\Models\Product::create([
                'name' => $name,
                'slug' => \Illuminate\Support\Str::slug($name),
                'ske' => $faker->postcode,
                'brand_id' => rand(1, 10),
                'image' => 'i6tHIxuEcef4jrxEy6BqG6S0tL8RYhvAgHIS99oB.png'
            ]);
        }
    }
}
