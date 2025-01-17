@extends('layouts.app')

@section('title', 'Show Product')

@section('content')
    <div>
        <a href="{{ route('products.index') }}">Back</a>
        <table>
            <thead>
                <tr>
                    <th>Product name</th>
                    <th>Product price</th>
                    <th>Product description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{ $product->name }}</th>
                    <th>{{ $product->price }}</th>
                    <th>{{ $product->description }}</th>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
