@extends('layouts.app')

@section('content')
    <h1>Editar Proveedor</h1>

    <form action="{{ route('suppliers.update', $supplier) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $supplier->name }}" required>
        </div>

        <div class="form-group">
            <label for="contact">Contacto</label>
            <input type="text" class="form-control" id="contact" name="contact" value="{{ $supplier->contact }}">
        </div>

        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $supplier->phone }}">
        </div>

        <button type="submit" class="btn btn-warning mt-2">Actualizar</button>
    </form>
@endsection
