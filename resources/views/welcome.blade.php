@extends('layout')

@section('title', '¡Bienvenido a reserva·T')

@section('content')
    @if (auth()->check())
        <h1>¡Hola, {{ auth()->user()->nombre }}! ¿Qué quieres hacer hoy?</h1>
        <p> Tu email es {{ auth()->user()->email }}</p>
        <a href="{{ route('photo.form') }}">Actualizar foto de perfil</a>
        <img src="{{ auth()->user()->foto }}" alt="Profile Picture">
    @else
        <h1>¡Bienvenido a reserva·T!</h1>
    @endif
@endsection