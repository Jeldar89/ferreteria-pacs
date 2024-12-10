<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplierOrderDetailRequest;
use App\Http\Requests\UpdateSupplierOrderDetailRequest;
use App\Models\SupplierOrderDetail;

class SupplierOrderDetailController extends Controller
{
    public function index()
    {
        $orderDetails = SupplierOrderDetail::all();
        return view('supplier_order_details.index', compact('orderDetails'));
    }

    public function create()
    {
        return view('supplier_order_details.create');
    }

    public function store(StoreSupplierOrderDetailRequest $request)
    {
        SupplierOrderDetail::create($request->validated());
        return redirect()->route('supplier_order_details.index')->with('success', 'Detalle de orden de proveedor creado con éxito.');
    }

    public function show(SupplierOrderDetail $orderDetail)
    {
        return view('supplier_order_details.show', compact('orderDetail'));
    }

    public function edit(SupplierOrderDetail $orderDetail)
    {
        return view('supplier_order_details.edit', compact('orderDetail'));
    }

    public function update(UpdateSupplierOrderDetailRequest $request, SupplierOrderDetail $orderDetail)
    {
        $orderDetail->update($request->validated());
        return redirect()->route('supplier_order_details.index')->with('success', 'Detalle de orden de proveedor actualizado con éxito.');
    }

    public function destroy(SupplierOrderDetail $orderDetail)
    {
        $orderDetail->delete();
        return redirect()->route('supplier_order_details.index')->with('success', 'Detalle de orden de proveedor eliminado con éxito.');
    }
}
