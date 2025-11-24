<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">Biblioteca</a>

        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ route('livros.index') }}">Livros</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('autores.index') }}">Autores</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('assuntos.index') }}">Assuntos</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>
