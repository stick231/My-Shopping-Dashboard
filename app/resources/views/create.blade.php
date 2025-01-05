<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create product</title>
</head>
<body>
    <a href="{{ route('products.index') }}">Back</a>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        @method('POST')
        <label for="">Product name<input type="text" name="name"></label>
        <label for="">Product price<input type="number" name="price"></label>
        <label for="">Product description<input type="text" name="description"></label>
        <input type="submit" value="create">
    </form>
</body>
</html>