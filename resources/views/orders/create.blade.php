@extends('adminlte::page')

@section('title', 'Create Order')

@section('content_header')
    <h1>New Order</h1>
@stop

@section('content')

    <div class="card">

        <div class="card-header">

            <h3 class="card-title">Create Order</h3>

        </div>
<div class="card-body">
    <form method="POST" action="{{ route('orders.store') }}">
        @csrf
        <div id="order-product-container">
            <div class="order-product-item">
                <div class="form-group">
                    <label for="product_id">Product</label>
                    <select class="form-control" id="product_id" name="product_id[]">
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity[]" min="1" required>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary" id="add-product">Add another product</button>
        <button type="submit" class="btn btn-success mt-3">Submit</button>
    </form>
</div>


    </div>

@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#add-product').click(function() {
        var productItem = $('.order-product-item').first().clone();
        productItem.find('input').val('');
        $('#order-product-container').append(productItem);
    });
});
</script>
@stop
