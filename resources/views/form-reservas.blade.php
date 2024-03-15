@extends('layout')

@section('title', 'Tus Reservas')

@section('content')

<form action="{{ route('reservas.show')}}" method='POST'>
    @csrf
<label for='inicio'>Fecha de inicio</label>
<input type='date' name='inicio' id='inicio'>
<label for='fin'>Fecha de fin</label>
<input type='date' name='fin' id='fin'>

    <button>Mostrar reservas</button>
</form>
{{-- mostrar aquí las reservas --}}

@if(isset($reservas))
    <h2>Reservas</h2>

    <table>
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->user->foto}}</td>
                    <td>{{ $reserva->user->nombre }}</td>
                    <td>{{ $reserva->fecha_reserva }}</td>
                    <td>{{ $reserva->hora }}</td>
                    <form action="{{ route('reservas.destroy', ['reserva' => $reserva->id]) }}" method='POST'>
                        @csrf
                    <td><button>Eliminar reserva</button></td>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <h2>Aún no hay ninguna reserva</h2>
@endif



@endsection
