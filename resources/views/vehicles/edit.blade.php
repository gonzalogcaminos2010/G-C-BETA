@extends('adminlte::page')

@section('title', 'Editar Vehículo')

@section('content_header')
    <h1>Editar Vehículo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h2>Editar Vehículo</h2>
            <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="license_plate">Patente</label>
                    <input type="text" name="license_plate" class="form-control" id="license_plate" value="{{ $vehicle->license_plate }}">
                </div>

                <div class="form-group">
                    <label for="make">Marca</label>
                    <input type="text" name="make" class="form-control" id="make" value="{{ $vehicle->make }}">
                </div>

                <div class="form-group">
                    <label for="model">Modelo</label>
                    <input type="text" name="model" class="form-control" id="model" value="{{ $vehicle->model }}">
                </div>

                <div class="form-group">
                    <label for="chassis_number">Número de Chasis</label>
                    <input type="text" name="chassis_number" class="form-control" id="chassis_number" value="{{ $vehicle->chassis_number }}">
                </div>

                <!-- Agrega aquí los campos de las fechas de mantenimiento si es necesario -->

                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop
