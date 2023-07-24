<!DOCTYPE html>
<html>
<head>
    <title>Orden {{ $order->id }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; }
        th { text-align: left; }
        .signature {
            margin-top: 50px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" height="100">
        <h1>Orden ID: {{ $order->id }}</h1>
    </div>

    <h2>Detalles de la Orden</h2>

    <p>Usuario: {{ $order->user->name }}</p>
    <p>Campamento: {{ $order->camp->name }}</p>

    <h2>Productos</h2>

    <table>
        <thead>
            <tr>
                <th>ID del Producto</th>
                <th>Nombre del Producto</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="signature">
        <p>FIRMA: ____________________________________________</p>
    </div>
</body>
</html>
