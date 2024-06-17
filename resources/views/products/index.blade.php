<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Changed from center to flex-start to enable scrolling */
            height: 100vh;
            overflow: auto; /* Added to ensure the body is scrollable */
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 900px;
            margin: 20px; /* Added margin for spacing around the container */
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            border: 1px solid #c3e6cb;
        }

        .add-product {
            display: block;
            width: 100%;
            max-width: 250px;
            margin: 20px auto;
            padding: 12px;
            font-size: 16px;
            text-align: center;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .add-product:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            table-layout: fixed; /* Ensures the table layout is fixed */
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
            transition: background-color 0.3s;
            word-wrap: break-word; /* Ensures words break within cells */
        }

        th {
            background-color: #f8f9fa;
            font-weight: 500;
            position: sticky; /* Keeps the header fixed at the top */
            top: 0;
            z-index: 1; /* Ensures the header is above other content */
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            padding: 8px 15px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-edit {
            background-color: #007bff;
            color: white;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        a.category-link {
            color: orange;
            font-weight: bold;
            text-decoration: none; /* Removes the underline */
            transition: color 0.3s; /* Adds a transition for the hover effect */
        }

        a.category-link:hover {
            color: #0056b3; /* Changes color on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Product List</h1>
        <div>
            @if(session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div>
            <a href="{{ route('product.create') }}" class="add-product">Add a Product</a>
        </div>
        <div>
        <table>
            <thead>
                <tr>
                    <th>Product Id</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="{{ route('categories.show', ['id' => $product->product_category_id]) }}" class="category-link">
                                {{ $product->category->name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-edit">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('product.delete', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>
