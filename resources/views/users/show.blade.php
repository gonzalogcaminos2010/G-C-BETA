@extends('adminlte::page')

@section('title', 'Detalles del Usuario')

@section('content_header')
    <h1>Detalles del Usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nombre: {{ $user->name }}</h5>
            <p class="card-text">Email: {{ $user->email }}</p>
        </div>
    </div>
    <a href="{{ route('users.index') }}" class="btn btn-primary mt-3">Volver a la lista de usuarios</a>
@stop
