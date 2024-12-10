<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplierOrderRequest;
use App\Http\Requests\UpdateSupplierOrderRequest;
use App\Models\Supplier;
use App\Models\SupplierOrder;

class SupplierOrderController extends Controller
{
    public function index()
    {
        $supplierOrders = SupplierOrder::all();
        return view('supplier_orders.index', compact('supplierOrders'));
    }

    public function create()
    {   
        $suppliers = Supplier::all();
        return view('supplier_orders.create' , compact('suppliers'));
    }

    public function store(StoreSupplierOrderRequest $request)
    {
        SupplierOrder::create($request->validated());
        return redirect()->route('supplier_orders.index')->with('success', 'Orden de proveedor creada con éxito.');
    }

    public function show(SupplierOrder $supplierOrder)
    {
        $supplierOrder->load('details.product');
        return view('supplier_orders.show', compact('supplierOrder'));
    }

    public function edit(SupplierOrder $supplierOrder)
    {
        return view('supplier_orders.edit', compact('supplierOrder'));
    }

    public function update(UpdateSupplierOrderRequest $request, SupplierOrder $supplierOrder)
    {
        $supplierOrder->update($request->validated());
        return redirect()->route('supplier_orders.index')->with('success', 'Orden de proveedor actualizada con éxito.');
    }

    public function destroy(SupplierOrder $supplierOrder)
    {
        $supplierOrder->delete();
        return redirect()->route('supplier_orders.index')->with('success', 'Orden de proveedor eliminada con éxito.');
    }
}
