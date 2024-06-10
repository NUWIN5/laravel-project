<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index',['products' => $products]);
        
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|integer', 
            'name' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|decimal:0,2',
        ]);
    
        $product = Product::create($data);
    
        return redirect(route('product.index'));
    }
    
}
