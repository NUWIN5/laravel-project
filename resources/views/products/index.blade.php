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
        <table border="1">
            <tr>
                <th>Product Id</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Edit</th>
                
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <a href="{{route('product.edit', ['product'=> $product])}}">Edit</a>
                </td>

            @endforeach
        </table>
    </div>
    
</body>
</html>