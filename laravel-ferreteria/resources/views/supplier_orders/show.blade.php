@extends('layouts.app')

@section('title', 'Detalles del Pedido')

@section('content')
    <h1>Detalles del Pedido</h1>

    <div class="mb-3">
        <strong>Proveedor:</strong> {{ $supplierOrder->supplier->name }}
    </div>
    <div class="mb-3">
        <strong>Fecha:</strong> {{ $supplierOrder->date }}
    </div>
    <div class="mb-3">
        <strong>Total:</strong> ${{ number_format($supplierOrder->total, 2) }}
    </div>

    <h2>Productos</h2>
    @if($supplierOrder->details->isEmpty())
        <p>No hay productos asociados a este pedido.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($supplierOrder->details as $detail)
                    <tr>
                        <td>{{ $detail->product->name }}</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>${{ number_format($detail->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('supplier-orders.index') }}" class="btn btn-secondary">Volver</a>
@endsection
