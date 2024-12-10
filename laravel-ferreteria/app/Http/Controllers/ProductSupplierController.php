<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductSupplierRequest;
use App\Http\Requests\UpdateProductSupplierRequest;
use App\Models\ProductSupplier;
use Illuminate\Support\Facades\DB;

class ProductSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductSupplierRequest $request)
    {
        // Insertar relación producto-proveedor en la tabla pivote
        DB::table('product_supplier')->insert([
            'product_id' => $request->product_id,
            'supplier_id' => $request->supplier_id,
        ]);

        return redirect()->route('product-suppliers.index')->with('success', 'Producto asociado con proveedor correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductSupplier $productSupplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductSupplier $productSupplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductSupplierRequest $request, ProductSupplier $productSupplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductSupplier $productSupplier)
    {
        //
    }
}
