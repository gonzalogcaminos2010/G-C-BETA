@extends('adminlte::page')

@section('title', 'Editar Producto')

@section('content_header')
    <h1>Editar Producto</h1>
@stop

@section('content')

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" id="name" placeholder="Ingrese el nombre del producto">
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" class="form-control" id="description" placeholder="Ingrese la descripción del producto">{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="code">Código</label>
            <input type="text" name="code" value="{{ $product->code }}" class="form-control" id="code" placeholder="Ingrese el código del producto">
        </div>

        <div class="form-group">
            <label for="price">Precio</label>
            <input type="text" name="price" value="{{ $product->price }}" class="form-control" id="price" placeholder="Ingrese el precio del producto">
        </div>

        <div class="form-group">
            <label for="supplier">Proveedor</label>
            <select class="form-control" name="supplier_id" id="supplier">
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" @if($product->supplier_id == $supplier->id) selected @endif>{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="category">Categoría</label>
            <select class="form-control" name="category_id" id="category">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($product->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>

@stop
