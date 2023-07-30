<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    //
    public function index()
    {
        // Obtiene todos los proveedores
        $suppliers = Supplier::all();

        // Retorna la vista de proveedores con la lista de proveedores
        return view('suppliers.index', ['suppliers' => $suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Solo necesitas retornar la vista para crear un proveedor
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'contact_phone' => 'nullable|string|max:255',
            'contact_email' => 'nullable|string|email|max:255',
            'address' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        // Crea el nuevo proveedor y lo guarda en la base de datos
        $supplier = new Supplier($request->all());
        $supplier->save();

        // Redirige al usuario a la lista de proveedores con un mensaje de éxito
        return redirect()->route('suppliers.index')
                         ->with('success', 'Proveedor creado con éxito.');
    }

}
