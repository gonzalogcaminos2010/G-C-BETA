@extends('adminlte::page')

@section('title', 'Create Order')

@section('content_header')
    <h1>Nuevo Pedido</h1>
@stop

@section('content')

    <div class="card">

        <div class="card-header">

            <h3 class="card-title">Crear Remito</h3>

        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('orders.store') }}">
                @csrf
                <div class="form-group">
                    <label for="camp_id">Campamento</label>
                    <select class="form-control" id="camp_id" name="camp_id">
                        @foreach($camps as $camp)
                            <option value="{{ $camp->id }}">{{ $camp->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div id="order-product-container">
                    
                        <div class="order-product-item">
                            <div class="form-group">
                                <label for="product_id">Producto</label>
                                <select class="form-control select2" id="product_id" name="product_id[]">
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                    </div>
                        <div class="form-group">
                            <label for="quantity">Cantidad</label>
                            <input type="number" class="form-control" id="quantity" name="quantity[]" min="1" required>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" id="add-product">Agregar otro elemento</button>
                <button type="submit" class="btn btn-success mt-3">Crear Remito</button>
            </form>
            <button type="button" class="btn btn-secondary mt-3" data-toggle="modal" data-target="#addProductModal">Añadir producto</button>
        </div>

        <!-- Modal para añadir un producto -->
        <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductModalLabel">Añadir producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addProductForm">
                            @csrf
                            <div class="form-group">
                                <label for="newProductName">Nombre del producto</label>
                                <input type="text" class="form-control" id="newProductName" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="newProductDescription">Descripción del producto</label>
                                <textarea class="form-control" id="newProductDescription" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="newProductCode">Código del producto</label>
                                <input type="text" class="form-control" id="newProductCode" name="code" required>
                            </div>
                       
                            
                            <div class="form-group">
                                <label for="newProductUserId">Usuario</label>
                                <select class="form-control" id="newProductUserId" name="user_id">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="newProductSupplierId">Proveedor</label>
                                <select class="form-control" id="newProductSupplierId" name="supplier_id">
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="newProductCategoryId">Categoría</label>
                                <select class="form-control" id="newProductCategoryId" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar producto</button>
                            </div>
                            
                </div>
            </div>
        </div>
    </div>

@stop

<!-- Rest of your Blade template code -->

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
    $('#add-product').click(function() {
        var productItem = $('.order-product-item').first().clone();
        productItem.find('input').val('');
        $('#order-product-container').append(productItem);
    });

    $('#addProductForm').on('submit', function(event) {
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "/products", // Actualiza esto a tu ruta API
            data: formData,
            success: function(data) {
                // Close the modal manually
                $('#addProductModal').modal('hide');
                
                // Append the new product to the product selector
                $('#product_id').append(new Option(data.name, data.id, true, true));
                
                // Clear the form fields
                $('#addProductForm')[0].reset();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
});
</script>
@stop

<!-- Rest of your Blade template code -->
