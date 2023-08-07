<?php

namespace App\Http\Controllers;
use App\Models\Corona;

use Illuminate\Http\Request;

class CoronaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        $coronas = Corona::all();
        return view('coronas.index', compact('coronas'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('coronas.create');
    }

    /**
     * Store a newly created resource in storage.
     */

     
public function store(Request $request)
{
    $request->validate([
        'fecha' => 'required|date',
        'empresa' => 'required|string|max:255',
        'cantidad' => 'required|integer',
        'tipo' => 'required|string|max:255',
        'marca' => 'required|string|max:255',
        'modelo' => 'required|string|max:255',
    ]);

    Corona::create($request->all());

    return redirect()->route('coronas.index')
                     ->with('success', 'Corona creada con éxito.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
