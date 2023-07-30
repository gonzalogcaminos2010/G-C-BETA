<!-- resources/views/camps/index.blade.php -->

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Camps</h1>
@stop

@section('content')
    <a href="{{ route('camps.create') }}" class="btn btn-primary mb-3">Crear nuevo Camp</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($camps as $camp)
                <tr>
                    <td>{{ $camp->id }}</td>
                    <td>{{ $camp->name }}</td>
                    <td>{{ $camp->location }}</td>
                    <td>
                        <a href="{{ route('camps.show', $camp->id) }}" class="btn btn-primary">Detalles</a>
                        <a href="{{ route('camps.edit', $camp->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('camps.destroy', $camp->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro que quieres eliminar este campo?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
