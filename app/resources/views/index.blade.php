<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
</head>
<body>
    <a href="{{ route('products.create') }}">Create product</a>
    <table>
        <thead>
            <tr>
                <th>Product name</th>
                <th>Product price</th>
                <th>Product description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <th>{{ $product->name }}</th>
                <th>{{ $product->price }}</th>
                <th>{{ $product->description }}</th>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <th><a href="{{ route('products.show', $product->id) }}">Show</a></th>
                    <th><a href="{{ route('products.edit', $product->id) }}">Edit</a></th>
                    @csrf
                    @method('DELETE')
                    <th> <button type="submit"><i></i> Delete</button></th>
                </form>
            </tr>

            @empty
                <tr>
                    <th colspan="4"><h3>No products</h3></th>
                </tr>
        @endforelse
        </tbody>
    </table>
</body>
</html>