<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        \Log::info($row); // Esto registrará en el log la fila que se está procesando
    
        return new Product([
            'name' => $row['name'] ?? 'Sin nombre',
            'description' => $row['description'] ?? 'Sin descripción',
            'code' => $row['code'] ?? 'Sin código',
            'user_id' => $row['user_id'] ?? null,
            'supplier_id' => $row['supplier_id'] ?? null,
            'category_id' => $row['category_id'] ?? null,
        ]);
    }
    
}

