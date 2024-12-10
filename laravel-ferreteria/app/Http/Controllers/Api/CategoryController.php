<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10)->withQueryString();
        return $categories;  // Retorna todas las categorías
    }

    public function store(StoreCategoryRequest $request)
    {
        // La validación ya está hecha en el StoreCategoryRequest
        $category = Category::create($request->validated());

        return response()->json($category, 201);  // Retorna la categoría creada
    }

    public function show($id)
    {
        return Category::findOrFail($id);  // Retorna una categoría específica
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());

        return response()->json($category, 200);  // Retorna la categoría actualizada
    }

    public function destroy($id)
    {
        Category::destroy($id);  // Elimina una categoría específica
        return response()->json(null, 204);  // Respuesta de eliminación exitosa
    }
}