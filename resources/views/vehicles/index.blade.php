@extends('adminlte::page')

@section('title', 'Lista de Vehículos')

@section('content_header')
    <h1>Lista de Vehículos</h1>
@stop

@section('content')
    <p>Gestión de vehículos</p>
    <a href="{{ route('vehicles.create') }}" class="btn btn-primary mb-3">Crear Nuevo Vehículo</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Patente</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicles as $vehicle)
                <tr>
                    <th scope="row">{{ $vehicle->id }}</th>
                    <td>{{ $vehicle->license_plate }}</td>
                    <td>{{ $vehicle->make }}</td>
                    <td>{{ $vehicle->model }}</td>
                    <td>
                        <a href="{{ route('vehicles.show', $vehicle->id) }}" class="btn btn-primary">Detalles</a>
                        <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro que quieres eliminar este vehículo?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
