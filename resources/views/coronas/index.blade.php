
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Coronas</h1>
@stop

@section('content')
    <p>Bienvenido al panel de administración.</p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Empresa</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Tipo</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coronas as $corona)
                <tr>
                    <th scope="row">{{ $corona->id }}</th>
                    <td>{{ $corona->fecha }}</td>
                    <td>{{ $corona->empresa }}</td>
                    <td>{{ $corona->cantidad }}</td>
                    <td>{{ $corona->tipo }}</td>
                    <td>{{ $corona->marca }}</td>
                    <td>{{ $corona->modelo }}</td>
                    <td>
                        <a href="{{ route('coronas.show', $corona->id) }}" class="btn btn-primary">Detalles</a>
                        <a href="{{ route('coronas.edit', $corona->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('coronas.destroy', $corona->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro que quieres eliminar esta corona?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
