<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use App\Models\Category;
use Maatwebsite\Excel\Facades\Excel;  // Agrega esta línea
use App\Imports\ProductsImport;  // Agrega esta línea
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
    $suppliers = Supplier::all();
    $categories = Category::all();
    return view('products.create', compact('suppliers', 'categories'));
}

public function store(Request $request)
{
    $request->validate([
        'supplier_id' => 'required|integer|exists:suppliers,id',
        'category_id' => 'required|integer|exists:categories,id',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'code' => 'required|string|max:255',
        
    ]);

    $product = new Product($request->all());
    $product->user_id = auth()->id(); // Asigna el user_id del usuario autenticado
    $product->save();

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
    $suppliers = Supplier::all();
    $categories = Category::all();
    return view('products.edit', compact('product', 'suppliers', 'categories'));
}


public function update(Request $request, $id)
{
    $request->validate([
        'supplier_id' => 'required|integer|exists:suppliers,id',
        'category_id' => 'required|integer|exists:categories,id',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'code' => 'required|string|max:255',
        'price' => 'required|numeric',
    ]);

    $product = Product::findOrFail($id);
    $product->update($request->all());

    return redirect()->route('products.index')
                     ->with('success', 'Product updated successfully.');
}



public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('products.index');
}

public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:csv,txt', // Solo permite archivos .csv y .txt
    ]);

    $file = $request->file('file');
    Excel::import(new ProductsImport, $file);

    return redirect()->back()->with('success', 'CSV importado correctamente');
}


}
