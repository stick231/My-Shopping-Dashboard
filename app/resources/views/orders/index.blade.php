@extends('layouts.app')

@section('title', 'Orders')

@section('title_page')
    <h1>Orders</h1>
@endsection

@section('content')

@forelse ($orders as $order)
    <div>
        <h3>Order #{{ $order->id }}</h3>
        <p>Status: {{ $order->status }}</p>
        <p>Total Price: {{ $order->total_price }}$</p>
        <p>Created at: {{ $order->created_at }}</p>
        <table>
            <thead>
                <tr>
                    <th>Product name</th>
                    <th>Quantity</th>
                    <th>Order price</th>
                    <th>Order status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}$</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('orders.show', $order->id) }}">Show</a>
                                <a href="{{ route('orders.edit', $order->id) }}">Edit</a>
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @empty
    <div class="empty-block">
        <h3>No orders</h3>
        <a href="{{ route('products.index') }}">Create order</a>
    </div>
    @endforelse
@endsection

