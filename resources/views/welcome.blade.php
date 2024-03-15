@extends('layout')

@section('title', '¡Bienvenido a reserva·T')

@section('content')
    @if (auth()->check())
        <h1>¡Hola, {{ auth()->user()->nombre }}! ¿Qué quieres hacer hoy?</h1>
        <p> Tu email es {{ auth()->user()->email }}</p>
        <a href="{{ route('photo.create') }}">Actualizar foto de perfil</a>
        <img src="{{ auth()->user()->foto }}" alt="Profile Picture">
        @if (auth()->user()->tipo == 'C')
        {{-- mostrar el nombre de todas las empresas --}}

        @endif
    @else
        <h1>¡Bienvenido a reserva·T!</h1>
    @endif
@endsection
