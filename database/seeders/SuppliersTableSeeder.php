<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 50; $i++) {
            DB::table('suppliers')->insert([
                'name' => Str::random(10),
                'contact_email' => Str::random(10).'@gmail.com',
                'contact_phone' => '1234567890',
                'address' => Str::random(20),
            ]);
        }
    }
}
