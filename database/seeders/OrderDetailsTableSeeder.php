<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

class OrderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i=0; $i < 500; $i++) {
            DB::table('order_details')->insert([
                'quantity' => rand(1, 100),
                'product_id' => rand(1, 100),
                'order_id' => rand(1, 200),
            ]);
        }
    }
}
