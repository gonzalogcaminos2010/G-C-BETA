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

}
