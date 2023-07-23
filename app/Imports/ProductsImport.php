<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    public function model(array $row)
    {
        return new Product([
            'name' => $row[0],
            'description' => $row[1],
            'code' => $row[2],
            'price' => $row[3],
            'user_id' => $row[4],
            'supplier_id' => $row[5],
            'category_id' => $row[6],
        ]);
    }
}

