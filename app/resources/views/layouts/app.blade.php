<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>@yield('title', 'Laravel App')</title>
</head>
<body>
    <h1>@yield('title_page')</h1>

    <header>
        <nav>
            <ul>
                <li><a href="{{ route('products.index') }}">Продукты</a></li>
                <li><a href="{{ route('orders.index') }}">Заказы</a></li>
                <li><a href="{{ route('products.create') }}">Создать продукт</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        @yield('content')
    </main>

    <footer>
        <p>{{ date('Y') }} Laravel App</p>
    </footer>
</body>
</html>
