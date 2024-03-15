@extends('layout')

@section('title', 'Servicios')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Button to create a new service -->
            <form action="{{ route('servicio.create') }}">
                <button class="btn btn-primary mb-3">Crear un nuevo servicio</button>
            </form>

            <!-- Table to display services -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Duración</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($servicios as $servicio)
                        <tr>
                            <td>{{ $servicio->nombre }}</td>
                            <td>{{ $servicio->descripcion }}</td>
                            <td>{{ $servicio->precio }} €</td>
                            <td>{{ $servicio->duracion }} min</td>
                            <td>
                                <form action="{{ route('servicio.form', ['servicio' => $servicio->id]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('servicios.destroy', $servicio->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No hay ningún servicio... ¡Todavía!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
