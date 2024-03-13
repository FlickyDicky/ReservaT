@extends('layout')

@section('title', 'Regístrate')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 form">
                <div class="card-body">
                    <h2>Regístrate</h2>
                    <hr>
                    <form method="POST" action="{{ route('register.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-5 col-form-label text-md-left">{{ __('Nombre') }}</label>
                            <div class="col-md-7">
                                <input id="nombre" type="text"
                                    class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                    value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
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
                                    value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>
                                @error('apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="direccion"
                                class="col-md-5 col-form-label text-md-left">{{ __('Dirección') }}</label>
                            <div class="col-md-7">
                                <input id="direccion" type="text"
                                    class="form-control @error('direccion') is-invalid @enderror" name="direccion"
                                    value="{{ old('direccion') }}" required autocomplete="direccion" autofocus>
                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="municipio"
                                class="col-md-5 col-form-label text-md-left">{{ __('Municipio') }}</label>
                            <div class="col-md-7">
                                <input id="municipio" type="text"
                                    class="form-control @error('municipio') is-invalid @enderror" name="municipio"
                                    value="{{ old('municipio') }}" required autocomplete="municipio" autofocus>
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
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono"
                                class="col-md-5 col-form-label text-md-left">{{ __('Teléfono') }}</label>
                            <div class="col-md-7">
                                <input id="telefono" type="text"
                                    class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                                    value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-5 col-form-label text-md-left">{{ __('Contraseña') }}</label>
                            <div class="col-md-7">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-5 col-form-label text-md-left">{{ __('Verificar Contraseña') }}</label>
                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-7 offset-md-4">
                                <button type="submit" class="btn primary-btn">{{ __('Registrarse') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
