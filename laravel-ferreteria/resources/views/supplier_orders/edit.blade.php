@extends('layouts.app')

@section('title', 'Editar Pedido')

@section('content')
    <h1>Editar Pedido</h1>

    <form action="{{ route('supplier-orders.update', $supplierOrder) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="supplier_id" class="form-label">Proveedor</label>
            <select name="supplier_id" id="supplier_id" class="form-control" required>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ $supplierOrder->supplier_id == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Fecha</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $supplierOrder->date }}" required>
        </div>

        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" name="total" id="total" class="form-control" value="{{ $supplierOrder->total }}" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-warning mt-2">Actualizar Pedido</button>
    </form>
@endsection
