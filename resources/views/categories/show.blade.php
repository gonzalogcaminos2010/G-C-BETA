@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Detalles de la Categoría</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $category->name }}</h5>
            <p class="card-text">ID: {{ $category->id }}</p>
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro que quieres eliminar esta categoría?')">Eliminar</button>
            </form>
        </div>
    </div>
@stop
