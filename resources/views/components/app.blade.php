<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Aplikasi Bansos' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ route('databantuan.index') }}">
                <i class="fas fa-hand-holding-heart"></i> Bansos
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('databantuan.*') ? 'active' : '' }}"
                            href="{{ route('databantuan.index') }}">Data Bantuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('desa.*') ? 'active' : '' }}"
                            href="{{ route('desa.index') }}">Data Desa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('penerimabantuan.*') ? 'active' : '' }}"
                            href="{{ route('penerimabantuan.index') }}">Penerima Bantuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('penerimabantuan.trash') ? 'active' : '' }}"
                            href="{{ route('penerimabantuan.trash') }}">Trash</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Page Title & Logo --}}
    <div class="py-4 text-center bg-light border-bottom">
        <img src="{{ asset('images/bansos.png') }}" alt="Bansos" width="120">
        <h1 class="fw-bold mt-2">{{ $title }}</h1>
    </div>

    <hr class="m-0">

    {{-- Main Content --}}
    <div class="container my-5">
        {{ $slot }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
