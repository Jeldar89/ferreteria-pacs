<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        return Supplier::paginate(10)->withQueryString();  // Retorna todos los proveedores
    }

    public function store(StoreSupplierRequest $request)
    {
        // La validación ya está hecha en el StoreSupplierRequest
        $supplier = Supplier::create($request->validated());

        return response()->json($supplier, 201);  // Retorna el proveedor creado
    }

    public function show($id)
    {
        return Supplier::findOrFail($id);  // Retorna un proveedor específico
    }

    public function update(UpdateSupplierRequest $request, $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->validated());

        return response()->json($supplier, 200);  // Retorna el proveedor actualizado
    }

    public function destroy($id)
    {
        Supplier::destroy($id);  // Elimina un proveedor específico
        return response()->json(null, 204);  // Respuesta de eliminación exitosa
    }
}
