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
    <ul>
        @foreach($reservas as $reserva)
            <li>{{ $reserva->user_id }}</li>
            <li>{{ $reserva->user->nombre }}</li>
        @endforeach
    </ul>
@else
<h2>Aún no hay ninguna reserva</h2>
@endif



@endsection
