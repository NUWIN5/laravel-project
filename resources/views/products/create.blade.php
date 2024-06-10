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
            <label>Name</label>
            <input type="text" name="name" placeholder="Product Name">
        </div>
        <div>
            <label>Quantity</label>
            <input type="text" name="qty" placeholder="Product Quantity">
        </div>
        <div>
            <label>Price</label>
            <input type="text" name="price" placeholder="Product Price">
        </div>
        <div>
            <input type="submit" value="Create a New Product">
    </form>
</body>
</html>