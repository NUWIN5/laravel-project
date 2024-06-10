<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit a Product</h1>
    <div>
        @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
                
            @endif
    </div>
    <form method="post" action="{{ route('product.update', ['product' => $product->id]) }}">

        @csrf
        @method('put')

        <div>
            <label>Product Id</label>
            <input type="number" name="id" placeholder="ID"/>
        </div>
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Product Name" value="{{$product->name}}"/>
        </div>
        <div>
            <label>Quantity</label>
            <input type="number" name="quantity" placeholder="Product Quantity" value="{{$product->quantity}}"/>
        </div>
        <div>
            <label>Price</label>
            <input type="number" name="price" placeholder="Product Price" value="{{$product->price}}"/>
        </div>
        <div>
        <button type="submit">Update Product</button>
    </form>
</body>
</html>