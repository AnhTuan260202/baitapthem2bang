<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 100; $i++) {
            DB::table('products')->insert([
                'name' => $faker->sentence(3),
                'description' => $faker->sentence(),
                'price' => $faker->randomFloat(null, 1, 500),
                'image' => 'product.jpg',
                'category_id' => rand(6, 10),
                'stock_quantity' => rand(0, 1000),
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
