<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::paginate(10)->withQueryString();  // Retorna todos los productos
    }

    public function store(StoreProductRequest $request)
    {
        // La validación ya está hecha en el StoreProductRequest
        $product = Product::create($request->validated());
        $product->categories()->sync($request->input('categories', [])); // Sincronizar categorías

        return response()->json($product, 201);  // Retorna el producto creado
    }

    public function show($id)
    {
        return Product::findOrFail($id);  // Retorna un producto específico
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->validated());
        $product->categories()->sync($request->input('categories', [])); // Sincronizar categorías

        return response()->json($product, 200);  // Retorna el producto actualizado
    }

    public function destroy($id)
    {
        Product::destroy($id);  // Elimina un producto específico
        return response()->json(null, 204);  // Respuesta de eliminación exitosa
    }
}
