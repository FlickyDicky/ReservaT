@extends('layout')

@section('title', 'Próximas citas')

@section('content')
<h1>Próximas citas</h1>

<input type='date' id='fecha' name='fecha'>
<button id='buscar'>Buscar</button>

<!-- visualizar las próximas citas -->
<h1>Próximas citas</h1>
<table>
    <tr>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Servicio</th>
        <th>Estado</th>
    </tr>
    @foreach ($citas as $cita)
        <tr>
            <td>{{$cita->fecha}}</td>
            <td>{{$cita->hora}}</td>
            <td>{{$cita->servicio}}</td>
            <td>{{$cita->estado}}</td>
        </tr>
    @endforeach
</table>
@endsection