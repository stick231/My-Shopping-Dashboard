<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index')->with('products' , Product::all());
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        Product::create($request->validated());

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function edit(Product $product)
    {
        return view('products.edit')->with('product', $product);
    }

    public function update(ProductRequest $request, Product $product) : RedirectResponse
    {
       $product->update($request->validated());

       return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function show(Product $product)
    {
        return view('products.show')->with('product', $product);
    } 

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete(); 
    
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
