<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Product</h1>
    <div>
    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
</div>
    <div>
        <a href="{{route('product.create')}}">Add a Product</a>
    </div>

    <div>
    <table border="1" class="large-table">
    <thead>
        <tr>
            <th>Product Id</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <a href="{{ route('product.edit', ['product'=> $product]) }}">Edit</a>
            </td>
            <td>
                <form method="post" action="{{ route('product.delete', ['product'=> $product]) }}">
                    @csrf
                    @method('delete')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

    </div>
    
</body>
</html>