<!-- resources/views/camps/create.blade.php -->

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear nuevo Campamento</h1>
@stop

@section('content')
    <form action="{{ route('camps.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Ubicación</label>
            <input type="text" class="form-control" id="location" name="location">
        </div>

        <button type="submit" class="btn btn-primary">Añadir Campamento</button>
    </form>
@stop
