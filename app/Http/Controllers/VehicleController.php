<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'license_plate' => 'required|string|max:255',
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'chassis_number' => 'required|string|max:255',
            // Agrega aquí las reglas de validación para las fechas de mantenimiento si es necesario
        ]);
    
        // Crear un nuevo objeto Vehicle con los datos validados
        $vehicle = new Vehicle([
            'license_plate' => $validatedData['license_plate'],
            'make' => $validatedData['make'],
            'model' => $validatedData['model'],
            'chassis_number' => $validatedData['chassis_number'],
            // Agrega aquí los campos de las fechas de mantenimiento si es necesario
        ]);
    
        // Guardar el objeto en la base de datos
        $vehicle->save();
    
        // Redireccionar a la lista de vehículos con un mensaje de éxito
        return redirect()->route('vehicles.index')->with('success', 'Vehículo creado exitosamente.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Buscar el vehículo por su ID en la base de datos
        $vehicle = Vehicle::findOrFail($id);
    
        // Cargar la vista de detalles del vehículo y pasar los datos del vehículo a la vista
        return view('vehicles.show', compact('vehicle'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Buscar el vehículo por su ID en la base de datos
        $vehicle = Vehicle::findOrFail($id);
    
        // Cargar la vista de edición del vehículo y pasar los datos del vehículo a la vista
        return view('vehicles.edit', compact('vehicle'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Buscar el vehículo por su ID en la base de datos
        $vehicle = Vehicle::findOrFail($id);
    
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'license_plate' => 'required|string|max:255',
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'chassis_number' => 'required|string|max:255',
            // Agrega aquí las reglas de validación para las fechas de mantenimiento si es necesario
        ]);
    
        // Actualizar los campos del vehículo con los datos validados
        $vehicle->update($validatedData);
    
        // Redireccionar a la lista de vehículos con un mensaje de éxito
        return redirect()->route('vehicles.index')->with('success', 'Vehículo actualizado exitosamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Buscar el vehículo por su ID en la base de datos
        $vehicle = Vehicle::findOrFail($id);
    
        // Eliminar el vehículo
        $vehicle->delete();
    
        // Redireccionar a la lista de vehículos con un mensaje de éxito
        return redirect()->route('vehicles.index')->with('success', 'Vehículo eliminado exitosamente.');
    }
    
}
