<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($handle = fopen(database_path('seeders/csv.csv'), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
                Product::create([
                    'name' => $data[0],
                    'description' => 'Descripción genérica',
                    'code' => $data[2],
                    'user_id' => 1,
                    'supplier_id' => 1,
                    'category_id' => 1,
                ]);
            }
            fclose($handle);
        }
    }
}
