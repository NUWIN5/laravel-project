<?php
// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = ProductCategory::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'product_category_name' => 'nullable|string',
            'product_category_id' => 'nullable|integer|exists:product_categories,id'
        ]);

        if ($request->product_category_name) {
            $category = ProductCategory::firstOrCreate(['name' => $validatedData['product_category_name']]);
        } else {
            $category = ProductCategory::find($request->product_category_id);
        }

        $product = Product::create([
            'id' => $validatedData['id'],
            'name' => $validatedData['name'],
            'quantity' => $validatedData['quantity'],
            'price' => $validatedData['price'],
            'product_category_id' => $category ? $category->id : null,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'product_category_name' => 'nullable|string',
            'product_category_id' => 'nullable|integer|exists:product_categories,id'
        ]);

        if ($request->product_category_name) {
            $category = ProductCategory::firstOrCreate(['name' => $validatedData['product_category_name']]);
        } else {
            $category = ProductCategory::find($request->product_category_id);
        }

        $product->update([
            'id' => $validatedData['id'],
            'name' => $validatedData['name'],
            'quantity' => $validatedData['quantity'],
            'price' => $validatedData['price'],
            'product_category_id' => $category ? $category->id : null,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function showByCategory($categoryId)
    {
        $category = ProductCategory::findOrFail($categoryId);
        $products = $category->products; // Using the relationship defined in the models
        return view('products.by_category', compact('category', 'products'));
    }
}
