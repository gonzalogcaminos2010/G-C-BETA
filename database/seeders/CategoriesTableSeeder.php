<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) {
            DB::table('categories')->insert([
                'name' => Str::random(10),
                'description' => Str::random(20),
                'image' => Str::random(10).'.jpg',
            ]);
        }
    }
}

