@extends('layouts.app')

@section('title', 'Edit Order')
@section('content')
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
@endsection