<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    //
    public function index()
{
    $products = Product::all();
    return view('products.index', ['products' => $products]);
}

public function create()
{
    return view('products.create');
}

public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|integer|exists:users,id',
        'supplier_id' => 'required|integer|exists:suppliers,id',
        'category_id' => 'required|integer|exists:categories,id',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'code' => 'required|string|max:255',
        'price' => 'required|numeric',
    ]);

    Product::create($request->all());

    return redirect()->route('products.index')
                     ->with('success', 'Product created successfully.');
}


public function show($id)
{
    $product = Product::findOrFail($id);
    return view('products.show', ['product' => $product]);
}

public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('products.edit', ['product' => $product]);
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required',
        // aquí van las demás reglas de validación
    ]);

    $product = Product::findOrFail($id);
    $product->update($request->all());

    return redirect()->route('products.index');
}

public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('products.index');
}

}
