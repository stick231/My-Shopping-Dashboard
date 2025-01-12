<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Update Order</title>
</head>
<body>
    <div>
        <a href="{{ route('orders.index') }}">Back</a>
        <form action="{{ route('orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="product">Select Product:</label>
            <select name="product_id" id="product" required>
                @foreach ($products as $product)
                    <option 
                        value="{{ $product->id }}" {{ $order->orderItems->contains('product_id', $product->id) ? 'selected' : '' }}>
                        {{ $product->name }} ({{ $product->price }} $)
                    </option>
                @endforeach
            </select>

            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>
