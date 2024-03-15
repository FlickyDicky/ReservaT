@extends('layout')

@section('title', 'Editar Servicios')

@section('content')
    <div class="row justify-content-center mx-auto">
        <div class="col-md-8 form">
            <div class="card-body">
                <h2 class="card-title">Editar Servicios</h2>
                <hr>
                <form method="POST" action="{{ route('servicios.update', $servicio->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $servicio->id }}">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Servicio</label>
                        <input type="text" class="form-control" name="nombre" value="{{ $servicio->nombre }}"
                            placeholder="{{ $servicio->nombre }}">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción del Servicio</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3"
                            placeholder="{{ $servicio->descripcion }}">{{ $servicio->descripcion }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio del Servicio</label>
                        <input type="number" class="form-control" name="precio" value="{{ $servicio->precio }}"
                            placeholder="{{ $servicio->precio }}">
                    </div>
                    <div class="mb-3">
                        <label for="duracion" class="form-label">Duración del Servicio</label>
                        <input type="number" class="form-control" name="duracion" value="{{ $servicio->duracion }}"
                            placeholder="{{ $servicio->duracion }}">
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6">
                            <button type='submit' class="btn primary-btn">Editar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
