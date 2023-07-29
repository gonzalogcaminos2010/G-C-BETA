@extends('adminlte::page')

@section('title', 'Historial de Inventario')

@section('content_header')
    <h1>Historial de Inventario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Movimientos de Inventario</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID del Producto</th>
                        <th>Nombre del Producto</th>
                        <th>Cantidad</th>
                        <th>Tipo de Movimiento</th>
                        <th>Notas</th>
                        <th>Fecha del Movimiento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inventories as $inventory)
                        <tr>
                            <td>{{ $inventory->product_id }}</td>
                            <td>{{ $inventory->product->name }}</td>
                            <td>{{ $inventory->quantity }}</td>
                            <td>{{ $inventory->movement_type }}</td>
                            <td>{{ $inventory->remarks }}</td>
                            <td>{{ $inventory->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $inventories->links() }}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
