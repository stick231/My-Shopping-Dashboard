<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Show product</title>
</head>
<body>
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
</body>
</html>
