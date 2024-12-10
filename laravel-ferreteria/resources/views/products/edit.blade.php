@extends('layouts.app')

@section('content')
<h1>Editar Producto</h1>

<form action="{{ route('products.update', $product) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
    </div>

    <div class="form-group">
        <label for="description">Descripción</label>
        <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
    </div>

    <div class="form-group">
        <label for="category_id">Categoría</label>
        <select class="form-select" id="category_id" name="categories[]">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ in_array($category->id, $productCategories) ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="price">Precio</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
    </div>

    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}" required>
    </div>

    <button type="submit" class="btn btn-warning mt-2">Actualizar</button>
</form>
@endsection