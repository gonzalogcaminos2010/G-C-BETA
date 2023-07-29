@extends('adminlte::page')

@section('title', 'Agregar Producto')

@section('content_header')
    <h1>Agregar Producto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Product Name">
                </div>

                <div class="form-group">
                    <label for="description">Descripcion</label>
                    <textarea name="description" class="form-control" id="description" placeholder="Enter Description"></textarea>
                </div>

                <div class="form-group">
                    <label for="code">Codigo</label>
                    <input type="text" name="code" class="form-control" id="code" placeholder="Enter Product Code">
                </div>


                <div class="form-group">
                    <label for="supplier">Proveedor</label>
                    <select class="form-control" name="supplier_id" id="supplier">
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="category">Categoria</label>
                    <select class="form-control" name="category_id" id="category">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@stop

