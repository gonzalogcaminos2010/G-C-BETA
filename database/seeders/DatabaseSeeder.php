<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\Camp;
use App\Models\Supplier;
use Database\Seeders\ProductSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create the specific user if they do not exist
        Supplier::firstOrCreate(['name' => 'Proveedor']);
        User::firstOrCreate(
            ['email' => 'gonzalogabrielcaminos@gmail.com'],
            [
                'name' => 'Gonzalo Gabriel Caminos',
                'password' => Hash::make('Nueva2022'),
                // Add any other fields as required
            ]
        );

        // Create some generic categories
        Category::firstOrCreate(['name' => 'Categoría 1']);
        Category::firstOrCreate(['name' => 'Categoría 2']);
        Category::firstOrCreate(['name' => 'Categoría 3']);

        // Create some camps
        Camp::firstOrCreate(['name' => 'Antofalla']);
        Camp::firstOrCreate(['name' => 'La Rioja']);

        // Call the ProductSeeder to seed the CSV data
        $this->call(ProductSeeder::class);  // Note the changed class name here
    }
}
