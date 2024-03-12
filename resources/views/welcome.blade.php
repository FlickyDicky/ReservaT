<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='icon' href='{{ asset('favicon.ico') }}' type='image/x-icon'/ >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>¡Bienvenido a reserva·T!</title>
</head>
<body>
    <!-- si existe una cookie con el nombre cliente_tipo y su valor es C mostrar x-navbar-cliente -->
    <x-selector-nav />
    <!-- si hay una cookie, mostrar el saludo -->
    @if (auth()->check())
        <h1>¡Hola, {{ auth()->user()->nombre }}! ¿Qué quieres hacer hoy?</h1>
        <p> Tu email es {{ auth()->user()->email }}</p>
        <a href="{{ route('photo.form') }}">Actualizar foto de perfil</a>
        <img src="{{ auth()->user()->foto }}" alt="Profile Picture">
    @else
        <h1>¡Bienvenido a reserva·T!</h1>
    @endif

</body>
</html>
