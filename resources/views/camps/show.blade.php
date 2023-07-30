<!-- resources/views/camps/show.blade.php -->

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Detalles del Camp</h1>
@stop

@section('content')
    <p><strong>Nombre: </strong>{{ $camp->name }}</p>
    <p><strong>Ubicación: </strong>{{ $camp->location }}</p>
@stop
