<!DOCTYPE html>
<html>
<head>
    <title>Orden {{ $order->id }}</title>
    <style>
        body { 
            font-family: DejaVu Sans, sans-serif; 
            font-size: 10px;
            padding: 0 20px;
        }
        table { 
            width: 100%; 
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 20px;
            margin: 0;
        }
        .header img {
            height: 80px;
        }
        .signature {
            margin-top: 50px;
            text-align: center;
        }
        h2 {
            font-size: 15px;
        }
        p {
            margin: 0;
        }
        .company-info {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="company-info">
        <p><strong>Razón Social:</strong> G&C Andalgalá Perforaciones SRL</p>
        <p><strong>Cuit:</strong> 30 71677123 3</p>
        <p><strong>Teléfono:</strong> 3834 542127</p>
        <p><strong>Fax:</strong> </p>
        <p><strong>Cod. Postal:</strong> 4740</p>
        <p><strong>Dirección:</strong> Chaquiago - Andalgalá - Catamarca</p>
        <p><strong>Localidad:</strong> Andalgalá</p>
        <p><strong>REMITO Nro:</strong> </p>
        <p><strong>Fecha:</strong> 16-07-23</p>
    </div>

    <div class="header">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
        <h1>Orden ID: {{ $order->id }}</h1>
    </div>

    <h2>Detalles de la Orden</h2>

    <p><strong>Usuario:</strong> {{ $order->user->name }}</p>
    <p><strong>Campamento:</strong> {{ $order->camp->name }}</p>

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
