<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i <= 50; $i++) {
            $name = $faker->name;
            \App\Models\Category::create([
                'name' => $name,
                'slug' => \Illuminate\Support\Str::slug($name),
            ]);
        }
    }
}
