<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CampsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 10; $i++) {
            DB::table('camps')->insert([
                'name' => 'Camp '.Str::random(5),
                'location' => Str::random(10),
            ]);
        }
    }
}