@extends('layout')

@section('title', 'Servicios')

@section('content')

<div class="row justify-content-center mx-auto">
    <div class="col-md-8 form">
        <div class="col-md-12">
            <!-- Button to create a new service -->
            <form action="{{ route('servicios.create') }}">
                <button class="btn primary-btn mb-3">Crear un nuevo servicio</button>
            </form>
            <!-- Table to display services -->
            <div class="table-responsive">
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
                                <form action="{{ route('servicios.edit', ['servicio' => $servicio->id]) }}">
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
    </div>
</div>


@endsection
