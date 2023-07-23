<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i=0; $i < 200; $i++) {
            DB::table('orders')->insert([
                'status' => Str::random(10),
                'user_id' => rand(1, 50),
                'camp_id' => rand(1, 10),
            ]);
        }
    }
}
