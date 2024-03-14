@extends('layout')

@section('title', '¡Bienvenido a reserva·T')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 form">
                <div class="card-body">
                    <h2>Editar Perfil</h2>
                    <hr>
                    <form action='{{ route('profile.update') }}' method='POST'>
                        @csrf
                        <div class="form-group">
                            <label for='name'>Nombre:</label>
                            <input type='text' class="form-control" name='nombre' id='nombre' value='{{ auth()->user()->nombre }}'
                                placeholder="{{ auth()->user()->nombre }}">
                        </div>
                        <div class="form-group">
                            <label for='apellidos'>Apellidos:</label>
                            <input type='text' class="form-control" name='apellidos' id='apellidos' value='{{ auth()->user()->apellidos }}'
                                placeholder='{{ auth()->user()->apellidos }}'>
                        </div>
                        <div class="form-group">
                            <label for='email'>Email:</label>
                            <input type='text' class="form-control" name='email' id='email' value='{{ auth()->user()->email }}'
                                placeholder='{{ auth()->user()->email }}'>
                        </div>
                        <div class="form-group">
                            <label for='telefono'>Telefono:</label>
                            <input type='text' class="form-control" name='telefono' id='telefono' value='{{ auth()->user()->telefono }}'
                                placeholder='{{ auth()->user()->telefono }}'>
                        </div>
                        <div class="form-group">
                            <label for='direccion'>Direccion:</label>
                            <input type='text' class="form-control" name='direccion' id='direccion' value='{{ auth()->user()->direccion }}'
                                placeholder='{{ auth()->user()->direccion }}'>
                        </div>

                        @if (auth()->user()->tipo == 'E')
                            <div class="form-group">
                                <label for='nombre_empresa'>Nombre de empresa:</label>
                                <input type='text' class="form-control" name='nombre_empresa' id='nombre_empresa'
                                    value='{{ auth()->user()->empresa->nombre_empresa }}'
                                    placeholder='{{ auth()->user()->empresa->nombre_empresa }}'>
                            </div>
                            <div class="form-group">
                                <label for='cif'>CIF:</label>
                                <input type='text' class="form-control" name='cif' id='cif' value='{{ auth()->user()->empresa->cif }}'
                                    placeholder='{{ auth()->user()->empresa->cif }}'>
                            </div>
                            <div class="form-group">
                                <label for='iban'>IBAN</label>
                                <input type='text' class="form-control" name='iban' id='iban' value='{{ auth()->user()->empresa->iban }}'
                                    placeholder='{{ auth()->user()->empresa->iban }}'>
                            </div>
                        @endif

                        <button type='submit' class="btn primary-btn">Editar</button>
                    </form>
                    <form action="{{ route('photo.upload') }}" method="post" enctype="multipart/form-data" class="mt-3">
                        @csrf
                        <div class="form-group">
                            <label for="photo">Subir Foto:</label>
                            <input type="file" class="form-control-file" name="photo" id="photo" accept="image/*">
                        </div>
                        <button type="submit" class="btn primary-btn">Subir Foto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
