<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $ids = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $faker = Faker\Factory::create();
        for ($i = 0; $i <= 50; $i++) {
            $name = $faker->name;

            $brand = \App\Models\Brand::create([
                'name' => $name,
                'slug' => \Illuminate\Support\Str::slug($name),
            ]);
            $brand->categories()->sync([1, 2, 3, 4]);
        }
    }
}
