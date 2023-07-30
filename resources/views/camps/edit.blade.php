<!-- resources/views/camps/edit.blade.php -->

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Campamento</h1>
@stop

@section('content')
    <form action="{{ route('camps.update', $camp->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $camp->name }}">
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Ubicación</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $camp->location }}">
        </div>

        <button type="submit" class="btn btn-primary">Editar Campamento</button>
    </form>
@stop
