@extends('layouts.app')

@section('content')
<h1>Crear Categoría</h1>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Guardar</button>
</form>
@endsection