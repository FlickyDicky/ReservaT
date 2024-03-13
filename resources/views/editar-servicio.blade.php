@extends('layout')

@section('title', 'Editar Servicios')

@section('content')
<form method="POST" action="{{ route('editar_servicio')}}">
    @csrf
    <input type="hidden" name="id" value="{{$servicio->id}}">

    <label for="nombre">Nombre del Servicio</label>
    <input type="text" name="nombre" value="{{$servicio->nombre}}" placeholder="{{$servicio->nombre}}">

    <label for="descripcion">Descripción del Servicio</label>
    <textarea name="descripcion" id="descripcion" cols="30" rows="10" placeholder="{{$servicio->descripcion}}">{{$servicio->descripcion}}</textarea>

    <label for="precio">Precio del Servicio</label>
    <input type="number" name="precio" value="{{$servicio->precio}}" placeholder="{{$servicio->precio}}">

    <label for="duracion">Duración del Servicio</label>
    <input type="number" name="duracion" value="{{$servicio->duracion}}" placeholder="{{$servicio->duracion}}">
    <button type="submit">Editar</button>
</form>

@endsection
