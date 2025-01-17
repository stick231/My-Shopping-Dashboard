<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="{{ asset('css/styleHomePage.css') }}">
    <title>Home page</title>
</head>
<body>
    <div class="home-navigation">
        <a class="home-btn" href="{{ route('products.index') }}">Products</a>
    </div>
    <div class="home-navigation">
        <a class="home-btn" href="{{ route('orders.index') }}">Orders</a>
    </div>
</body>
</html>