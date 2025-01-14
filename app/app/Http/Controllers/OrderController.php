<?php

namespace App\Http\Controllers;

use App\Events\OrderPlaced;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderController extends Controller
{
    public function index() 
    {
        $orders = Order::with('orderItems.product')->get();
        return view('orders.index', compact('orders'));
    }

    public function store(OrderRequest $request)
    {
        $validated = $request->validated();
    
        $product = Product::findOrFail($validated['product_id']);
        
        $order = Order::create(['total_price' => $product->price]);

        event(new OrderPlaced($order));
        
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $validated['quantity'] ?? 1,
            'price' => $product->price
        ]);

        return redirect()->route('orders.index');
    }

    public function show(Order $order)
    {
        return view('orders.show')->with('order', $order);
    }

    public function edit(Order $order)
    {
        $products = Product::all();
        return view('orders.edit', compact('products', 'order'));
    }

    public function update(OrderRequest $request, Order $order)
    {
        $validated = $request->validated();
    
        $product = Product::findOrFail($validated['product_id']);
    
        $order->update(['total_price' => $product->price * ($validated['quantity'] ?? 1) ]);
        $orderItem = $order->orderItems()->where('order_id', $order->id)->first();

        if ($orderItem) {
            $orderItem->update([
                'product_id' => $validated['product_id'],
                'quantity' => $validated['quantity'] ?? 1,
                'price' => $product->price,
            ]);
        }
        
    
        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->back();
    }
}
