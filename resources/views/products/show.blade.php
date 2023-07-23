@extends('adminlte::page')

@section('title', 'Producto Detalles')

@section('content_header')
    <h1>{{ $product->name }}</h1>
@stop

@section('content')
    <p>Detalles del producto:</p>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <p class="card-text">Precio: {{ $product->price }}</p>
            <!-- Aquí puedes agregar más detalles del producto como quieras -->
        </div>
    </div>
@stop
