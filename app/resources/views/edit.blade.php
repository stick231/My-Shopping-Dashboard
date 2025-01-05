<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit product</title>
</head>
<body>
    <a href="{{ route('products.index') }}">Back</a>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{$product->name}}">  
        <input type="text" name="price" value="{{$product->price}}">  
        <input type="text" name="description" value="{{$product->description}}"> 
        <input type="submit" value="Update"> 
    </form>
</body>
</html>
