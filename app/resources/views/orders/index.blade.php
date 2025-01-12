<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Orders</title>
</head>
<body>
    <h1>Orders</h1>
    @forelse ($orders as $order)
        <div>
            <h3>Order #{{ $order->id }}</h3>
            <p>Status: {{ $order->status }}</p>
            <p>Total Price: {{ $order->total_price }}</p>
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
                    @foreach ($order->orderItems as $item) {{-- понять как работает --}}
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }}</td>
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
</body>
</html>
