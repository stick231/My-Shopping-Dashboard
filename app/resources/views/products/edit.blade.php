@extends('layouts.app')

@section('title', 'Edit product')

@section('content')
<div>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Product name</label>
        <input type="text" name="name" value="{{ $product->name }}">
        
        <label for="price">Product price</label>
        <input type="number" name="price" value="{{ $product->price }}">
        
        <label for="description">Product description</label>
        <input type="text" name="description" value="{{ $product->description }}">
        
        <input type="submit" value="Update">
    </form>
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p class="error-validation">{{ $error }}</p>
            @endforeach
        </div>
    @endif
</div>
@endsection