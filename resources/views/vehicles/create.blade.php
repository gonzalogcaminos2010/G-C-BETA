@extends('adminlte::page')

@section('title', 'Agregar Vehículo')

@section('content_header')
    <h1>Agregar Vehículo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('vehicles.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="license_plate">Patente</label>
                    <input type="text" name="license_plate" class="form-control" id="license_plate" placeholder="Ingrese la Patente">
                </div>

                <div class="form-group">
                    <label for="make">Marca</label>
                    <input type="text" name="make" class="form-control" id="make" placeholder="Ingrese la Marca">
                </div>

                <div class="form-group">
                    <label for="model">Modelo</label>
                    <input type="text" name="model" class="form-control" id="model" placeholder="Ingrese el Modelo">
                </div>

                <div class="form-group">
                    <label for="chassis_number">Número de Chasis</label>
                    <input type="text" name="chassis_number" class="form-control" id="chassis_number" placeholder="Ingrese el Número de Chasis">
                </div>

                <!-- Agregar aquí los campos de las fechas de mantenimiento -->

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@stop
