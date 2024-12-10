@extends('layouts.app')

@section('title', 'Pedidos de Proveedores')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Pedidos de Proveedores</h1>
        <a href="{{ route('supplier-orders.create') }}" class="btn btn-primary">Nuevo Pedido</a>
    </div>

    @if($supplierOrders->isEmpty())
        <p>No hay pedidos registrados.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Proveedor</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($supplierOrders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->supplier->name }}</td>
                        <td>{{ $order->date }}</td>
                        <td>${{ number_format($order->total, 2) }}</td>
                        <td>
                            <a href="{{ route('supplier-orders.show', $order) }}" class="btn btn-info btn-sm">Detalles</a>
                            <a href="{{ route('supplier-orders.edit', $order) }}" class="btn btn-warning btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
