
@extends('adminlte::page')

@section('title', 'Agregar Corona')

@section('content_header')
    <h1>Agregar Corona</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('coronas.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="date" name="fecha" class="form-control" id="fecha">
                </div>

                <div class="form-group">
                    <label for="empresa">Empresa</label>
                    <input type="text" name="empresa" class="form-control" id="empresa" placeholder="Enter Company Name">
                </div>

                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" name="cantidad" class="form-control" id="cantidad" placeholder="Enter Quantity">
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <input type="text" name="tipo" class="form-control" id="tipo" placeholder="Enter Type">
                </div>

                <div class="form-group">
                    <label for="marca">Marca</label>
                    <input type="text" name="marca" class="form-control" id="marca" placeholder="Enter Brand">
                </div>

                <div class="form-group">
                    <label for="modelo">Modelo</label>
                    <input type="text" name="modelo" class="form-control" id="modelo" placeholder="Enter Model">
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@stop