<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i=0; $i < 100; $i++) {
            DB::table('products')->insert([
                'name' => Str::random(10),
                'description' => Str::random(20),
                'code' => Str::random(10),
                'price' => rand(100, 1000),
                'user_id' => rand(1, 50),
                'supplier_id' => rand(1, 50),
                'category_id' => rand(1, 10),
            ]);
        }
    }
}