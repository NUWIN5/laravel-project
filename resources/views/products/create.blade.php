<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .error-list {
            color: red;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input, .form-group select {
            width: calc(100% - 22px);
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group input:focus, .form-group select:focus {
            border-color: #66afe9;
            outline: none;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create Product</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('products.store') }}">
            @csrf
            <div class="form-group">
                <label>Product Id</label>
                <input type="number" name="id" value="{{ old('id') }}" placeholder="ID">
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Product Name">
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <input type="number" name="quantity" value="{{ old('quantity') }}" placeholder="Product Quantity">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" step="0.01" value="{{ old('price') }}" placeholder="Product Price">
            </div>
            <div class="form-group">
                <label>Category Name (New)</label>
                <input type="text" name="product_category_name" value="{{ old('product_category_name') }}" placeholder="Category Name">
            </div>
            <div class="form-group">
                <label>Category (Existing)</label>
                <select name="product_category_id">
                    <option value="">Select a Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Add Product</button>
            </div>
        </form>
    </div>
</body>
</html>
