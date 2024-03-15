@extends('layout')

@section('title', 'Perfil')

@section('content')
    <div class="row mx-auto">
        <div class="col-md-6 mx-auto form">
            <div class="card-body">
                <div class="row" style="gap: 1em;">
                    <div class="col">
                        <h2>Perfil</h2>
                    </div>
                    <button type="button" class="btn primary-btn" style="height: fit-content;" data-toggle="modal"
                        data-target="#uploadPhotoModal">
                        Cambiar Foto
                    </button>
                    <div class="edit-form-prfile-pic">
                        <img src="{{ '/' . auth()->user()->foto }}" alt="Imagen de Perfil">
                    </div>
                </div>
                <hr>
                <form action='{{ route('profile.update') }}' method='POST'>
                    @csrf
                    <div class="form-group row">
                        <label for="nombre" class="col-md-5 col-form-label text-md-left">{{ __('Nombre') }}</label>
                        <div class="col-md-7">
                            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror"
                                name="nombre" value="{{ auth()->user()->nombre }}"
                                placeholder="{{ auth()->user()->nombre }}" required autocomplete="nombre" autofocus>
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="apellido" class="col-md-5 col-form-label text-md-left">{{ __('Apellido') }}</label>
                        <div class="col-md-7">
                            <input id="apellido" type="text"
                                class="form-control @error('apellido') is-invalid @enderror" name="apellido"
                                value="{{ auth()->user()->apellidos }}" placeholder="{{ auth()->user()->apellidos }}"
                                required autocomplete="apellido" autofocus>
                            @error('apellido')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="direccion" class="col-md-5 col-form-label text-md-left">{{ __('Dirección') }}</label>
                        <div class="col-md-7">
                            <input id="direccion" type="text"
                                class="form-control @error('direccion') is-invalid @enderror" name="direccion"
                                value="{{ auth()->user()->direccion }}" placeholder="{{ auth()->user()->direccion }}"
                                required autocomplete="direccion" autofocus>
                            @error('direccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="municipio" class="col-md-5 col-form-label text-md-left">{{ __('Municipio') }}</label>
                        <div class="col-md-7">
                            <input id="municipio" type="text"
                                class="form-control @error('municipio') is-invalid @enderror" name="municipio"
                                value="{{ auth()->user()->municipio }}" placeholder="{{ auth()->user()->municipio }}"
                                required autocomplete="municipio" autofocus>
                            @error('municipio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email"
                            class="col-md-5 col-form-label text-md-left">{{ __('Correo Electrónico') }}</label>
                        <div class="col-md-7">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ auth()->user()->email }}"
                                placeholder="{{ auth()->user()->email }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telefono" class="col-md-5 col-form-label text-md-left">{{ __('Teléfono') }}</label>
                        <div class="col-md-7">
                            <input id="telefono" type="text"
                                class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                                value="{{ auth()->user()->telefono }}" placeholder="{{ auth()->user()->telefono }}"
                                required autocomplete="telefono" autofocus>
                            @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    @if (auth()->user()->tipo == 'E')
                        <div class="form-group">
                            <label for='nombre_empresa'>Nombre de empresa</label>
                            <input type='text' class="form-control" name='nombre_empresa' id='nombre_empresa'
                                value='{{ auth()->user()->empresa->nombre_empresa }}'
                                placeholder='{{ auth()->user()->empresa->nombre_empresa }}'>
                        </div>
                        <div class="form-group">
                            <label for='cif'>CIF</label>
                            <input type='text' class="form-control" name='cif' id='cif'
                                value='{{ auth()->user()->empresa->cif }}'
                                placeholder='{{ auth()->user()->empresa->cif }}'>
                        </div>
                        <div class="form-group">
                            <label for='iban'>IBAN</label>
                            <input type='text' class="form-control" name='iban' id='iban'
                                value='{{ auth()->user()->empresa->iban }}'
                                placeholder='{{ auth()->user()->empresa->iban }}'>
                        </div>
                    @endif
                    <div class="form-group row mb-0">
                        <div class="col-md-2 offset-md-5">
                            <button type='submit' class="btn primary-btn">Editar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="uploadPhotoModal" tabindex="-1" role="dialog" aria-labelledby="uploadPhotoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadPhotoModalLabel">Subir Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('photo.upload') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="photo" class="btn primary-btn">
                                Seleccionar Archivo
                                <input type="file" class="form-control-file d-none @error('photo') is-invalid @enderror"
                                       name="photo" id="photo" accept="image/*" onchange="displayFileName(this)">
                            </label>
                            <br>
                            <span id="file-name" class="badge badge-secondary"></span>
                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn primary-btn">Subir Foto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script defer>
        function displayFileName(input) {
            const fileName = input.files[0].name;
            document.getElementById('file-name').innerText = fileName;
        }
    </script>
@endsection
