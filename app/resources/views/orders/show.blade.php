
@extends('layouts.app')

@section('title', 'Order #'.$order->id)

@section('content')
<div>
    <h3>Order #{{ $order->id }}</h3>
    <p>Status: {{ $order->status }}</p>
    <p>Total Price: {{ $order->total_price }} $</p>
    @if ($order->created_at->diffInSeconds($order->updated_at) <= 1)
        <p>Created at: {{ $order->created_at }}</p>
    @else
        <p>Updated at: {{ $order->updated_at }}</p>
    @endif
    <table>
        <thead>
            <tr>
                <th>Product name</th>
                <th>Quantity</th>
                <th>Order price</th>
                <th>Order status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }} $</td>
                    <td>{{ $order->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
