@extends('layouts.app')

@section('title', 'Nuevo Pedido')

@section('content')
    <h1>Nuevo Pedido</h1>

    <form action="{{ route('supplier-orders.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="supplier_id" class="form-label">Proveedor</label>
            <select name="supplier_id" id="supplier_id" class="form-control" required>
                <option value="">Seleccionar Proveedor</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Fecha</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
        </div>

        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" name="total" id="total" class="form-control" value="{{ old('total') }}" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Crear Pedido</button>
    </form>
@endsection
