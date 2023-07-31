<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validación
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            // otras reglas de validación para los demás campos de producto...
        ]);

        // Creación de Producto
        $product = Product::create($validatedData);

        // Responder con el producto creado
        return response()->json($product, 201);
    }
}
