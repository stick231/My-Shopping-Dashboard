<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Order</title>
</head>
<body>
    <div>
        <a href="{{ route('orders.index') }}">Back</a>
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
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item) {{-- понять как работает --}}
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $order->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>