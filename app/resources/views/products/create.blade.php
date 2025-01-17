@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
<div>
    <a href="{{ route('products.index') }}">Back</a>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label for="">Product name<input type="text" name="name"></label>
        <label for="">Product price<input type="number" name="price"></label>
        <label for="">Product description<input type="text" name="description"></label>
        <input type="submit" value="Create">
    </form>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <p class="error-validation">{{ $error }}</p>
        @endforeach
    @endif
</div>
@endsection