<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('styles') <!-- For additional styles like custom CSS -->
</head>

<body>
    <div class="container">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light mt-4">
            <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Ferretería') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">Categorías</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('suppliers.index') }}">Proveedores</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('supplier-orders.index') }}">Ordenes</a>
                    </li> -->
                </ul>
            </div>
        </nav>
        <!-- alertas dinamicas del componente alerts -->


        <!-- Content -->
        <div class="container mt-4">
            {{-- Incluir el Componente de Alertas --}}
            <x-alert />

            {{-- Contenido de la Vista --}}
            @yield('content')
        </div>
    </div>



    @stack('scripts') <!-- For additional scripts like custom JS -->
</body>

</html>