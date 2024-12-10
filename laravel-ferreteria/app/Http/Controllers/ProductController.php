<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class ProductController extends Controller
{ public function index()
    {
        $products = Product::simplePaginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all(); // Obtiene todas las categorías
        return view('products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        //dd($request->all());
        $product = Product::create($request->validated());
        $product->categories()->sync($request->input('categories', [])); // Sincronizar categorías
        
        return redirect()->route('products.index')->with('success', 'Producto creado con éxito.');

    }

    public function show(Product $product)
    {   
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all(); // Obtiene todas las categorías
        $productCategories = $product->categories->pluck('id')->toArray(); // IDs de las categorías asociadas
        //dd($product);
        return view('products.edit', compact('product', 'categories', 'productCategories'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        
        $product->update($request->validated());
        $product->categories()->sync($request->input('categories', [])); // Sincronizar categorías
        return redirect()->route('products.index')->with('success', 'Producto actualizado con éxito.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado con éxito.');
    }
}
