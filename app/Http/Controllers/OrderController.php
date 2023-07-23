<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Camp;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|array',
            'quantity' => 'required|array',
        ]);

        $order = new Order([
            'user_id' => auth()->id(),
        ]);
        $order->save();

        $productIds = $request->input('product_id');
        $quantities = $request->input('quantity');

        $productsData = [];
        foreach ($productIds as $index => $productId) {
            $quantity = $quantities[$index];
            $productsData[$productId] = ['quantity' => $quantity];
        }

        $order->products()->attach($productsData);

        // Realiza alguna acción o redirige después de crear la orden.
        // Por ejemplo, redireccionar a una página de éxito:
        return redirect()->route('orders.index')->with('success', 'Orden creada exitosamente.');
    }  // <-- Este es el cierre de llave correcto para la función store

// En tu controlador
public function show($id)
{
    $order = Order::with('products')->findOrFail($id);
    //dd($order);
    return view('orders.show', compact('order'));
}



    public function edit(Order $order)
    {
        $products = Product::all();
        return view('orders.edit', compact('order', 'products'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'product_id' => 'required|array',
            'quantity' => 'required|array',
        ]);

        foreach ($request->product_id as $key => $productId) {
            $orderDetail = OrderDetail::where('order_id', $order->id)
                ->where('product_id', $productId)
                ->first();
            if($orderDetail) {
                $orderDetail->quantity = $request->quantity[$key];
                $orderDetail->save();
            } else {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $request->quantity[$key],
                ]);
            }
        }

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
