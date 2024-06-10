<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create a Product</h1>
    <form method="post" action="{{route('product.store')}}">
        @csrf
        @method('post')

        <div>
            <label>id</label>
            <input type="number" name="id" placeholder="Product ID">
        </div>
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Product Name">
        </div>
        <div>
            <label>Quantity</label>
            <input type="number" name="quantity" placeholder="Product Quantity">
        </div>
        <div>
            <label>Price</label>
            <input type="number" name="price" placeholder="Product Price">
        </div>
        <div>
        <button type="submit">Add Product</button>
    </form>
</body>
</html>