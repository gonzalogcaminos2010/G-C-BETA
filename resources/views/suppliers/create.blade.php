@extends('adminlte::page')

@section('title', 'Nuevo Proveedor')

@section('content_header')
    <h1>Nuevo Proveedor</h1>
@stop

@section('content')

<form method="POST" action="{{ route('suppliers.store') }}">
    @csrf

    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>

    <div class="form-group">
        <label for="contact_person">Persona de contacto</label>
        <input type="text" class="form-control" id="contact_person" name="contact_person">
    </div>

    <div class="form-group">
        <label for="contact_phone">Teléfono de contacto</label>
        <input type="text" class="form-control" id="contact_phone" name="contact_phone">
    </div>

    <div class="form-group">
        <label for="contact_email">Email de contacto</label>
        <input type="email" class="form-control" id="contact_email" name="contact_email">
    </div>

    <div class="form-group">
        <label for="address">Dirección</label>
        <input type="text" class="form-control" id="address" name="address">
    </div>

    <div class="form-group">
        <label for="notes">Notas</label>
        <textarea class="form-control" id="notes" name="notes"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Crear</button>

</form>

@stop
