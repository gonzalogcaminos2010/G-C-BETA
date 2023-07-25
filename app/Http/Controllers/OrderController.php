<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Camp;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCreated; // Importa la clase OrderCreated aquí

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
        $camps = Camp::all();
        return view('orders.create', compact('products', 'camps'));
    }

    public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required|array',
        'quantity' => 'required|array',
        'camp_id' => 'required|exists:camps,id'
    ]);

    $order = new Order([
        'user_id' => auth()->id(),
        'camp_id' => $request->input('camp_id'),
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

    // Enviar el correo electrónico
    Mail::to($order->user->email)->send(new OrderCreated($order));

    return redirect()->route('orders.index')->with('success', 'Orden creada exitosamente.');
}

    public function show($id)
    {
        $order = Order::with('products')->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $products = Product::all();
        $camps = Camp::all();
        return view('orders.edit', compact('order', 'products', 'camps'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'product_id' => 'required|array',
            'quantity' => 'required|array',
            'camp_id' => 'required|exists:camps,id' // Aquí se asegura que el camp_id es requerido y existe en la tabla camps
        ]);
        

        $order->update(['camp_id' => $request->input('camp_id')]);

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
    public function downloadPdf($id)
    {
        $order = Order::with('products')->findOrFail($id);
    
        // Generar el PDF
        $pdf = PDF::loadView('orders_pdf', compact('order'));  // Nota el cambio aquí
    
        // Descargar el PDF
        return $pdf->download('order_' . $order->id . '.pdf');
    }
    
    
}
