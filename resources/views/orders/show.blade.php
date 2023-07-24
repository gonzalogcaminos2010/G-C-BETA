@extends('adminlte::page')

@section('title', 'Detalles de la Orden')

@section('content_header')
    <h1>Detalles de la Orden ID: {{ $order->id }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Usuario: {{ $order->user->name }}</h3>
            @if($order->camp)
                <h3 class="card-title">Campamento: {{ $order->camp->name }}</h3>  
            @else
                <h3 class="card-title">Campamento: No asociado</h3>  
            @endif
            <a href="{{ route('orders.pdf', ['id' => $order->id]) }}" class="btn btn-primary float-right">Descargar PDF</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID del Producto</th>
                        <th>Nombre del Producto</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->pivot->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
