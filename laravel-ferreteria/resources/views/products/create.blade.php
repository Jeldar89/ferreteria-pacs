@extends('layouts.app')

@section('content')
<h4>Crear Producto</h4>

<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="form-group">
        <label for="description">Descripción</label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>

    <div class="form-group">
        <label for="category_id">Categoría</label>
        <select class="form-select" id="categories" name="categories[]">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="price">Precio</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" required>
    </div>

    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" required>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Guardar</button>
</form>
@endsection