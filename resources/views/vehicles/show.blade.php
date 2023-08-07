@extends('adminlte::page')

@section('title', 'Detalles del Vehículo')

@section('content_header')
    <h1>Detalles del Vehículo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h2>Detalles del Vehículo</h2>
            <ul>
                <li><strong>ID:</strong> {{ $vehicle->id }}</li>
                <li><strong>Patente:</strong> {{ $vehicle->license_plate }}</li>
                <li><strong>Marca:</strong> {{ $vehicle->make }}</li>
                <li><strong>Modelo:</strong> {{ $vehicle->model }}</li>
                <li><strong>Número de Chasis:</strong> {{ $vehicle->chassis_number }}</li>
                <!-- Agrega aquí los campos de las fechas de mantenimiento si es necesario -->
            </ul>
            <a href="{{ route('vehicles.index') }}" class="btn btn-primary">Volver a la Lista</a>
        </div>
    </div>
@stop
