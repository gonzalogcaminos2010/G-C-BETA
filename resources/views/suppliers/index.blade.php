@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <h1>Proveedores</h1>
@stop

@section('content')

<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Contacto</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Dirección</th>
            <th>Notas</th>
        </tr>
    </thead>
    <tbody>
        @foreach($suppliers as $supplier)
        <tr>
            <td>{{ $supplier->name }}</td>
            <td>{{ $supplier->contact_person }}</td>
            <td>{{ $supplier->contact_phone }}</td>
            <td>{{ $supplier->contact_email }}</td>
            <td>{{ $supplier->address }}</td>
            <td>{{ $supplier->notes }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop
