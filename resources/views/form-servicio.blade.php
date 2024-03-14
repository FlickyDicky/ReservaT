@extends('layout')

@section('title', 'Servicios')

@section('content')

<!-- Crear una tabla con todos los servicios-->
<form action="{{ route ('servicios.form.create')}}">
    <button>Crear un nuevo servicio</button>
</form>
<table>
    @if ($servicios->count() > 0)
    <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Duración</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>

        @foreach ($servicios as $servicio)
            <tr>
                <td>{{$servicio->nombre}}</td>
                <td>{{$servicio->descripcion}}</td>
                <td>{{$servicio->precio}} €</td>
                <td>{{$servicio->duracion}} min</td>
                <td>
                    <form action="{{route('servicios.form.update', ['servicio' => $servicio->id])}}">
                        {{-- <!--{{route('editar_servicio')}}--> --}}
                        <input type="hidden" name="id" value="{{$servicio->id}}">
                        <button>Editar</button>
                    </form>
                </td>
                <td>
                    {{-- <!-- {{route('eliminar_servicio')}}--> --}}
                    <form action="{{route('servicios.destroy', $servicio->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$servicio->id}}">
                        <button>Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="6">No hay ningún servicio... ¡Todavía!</td>
        </tr>
    @endif
@endsection



