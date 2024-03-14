@extends('layout')

@section('title', 'Registra tu empresa')

@section('content')

    <div class="row mx-auto">
        <div class="col-md-6 mx-auto form">
            <div class="card-body">
                <h2>Registra tu empresa</h2>
                <hr>
                <!-- formulario de registro con nombre apellido email telefono contraseña verificar contraseña-->
                <form method="POST" action="{{ route('company.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="nombre"
                            class="col-md-6 col-form-label text-md-left">{{ __('Nombre de Empresa') }}</label>
                        <div class="col-md-6">
                            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror"
                                name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cif" class="col-md-6 col-form-label text-md-left">{{ __('CIF') }}</label>
                        <div class="col-md-6">
                            <input id="cif" type="text" class="form-control @error('cif') is-invalid @enderror"
                                name="cif" value="{{ old('cif') }}" required autocomplete="cif" autofocus>
                            @error('cif')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="iban" class="col-md-6 col-form-label text-md-left">{{ __('IBAN') }}</label>
                        <div class="col-md-6">
                            <input id="iban" type="text" class="form-control @error('iban') is-invalid @enderror"
                                name="iban" value="{{ old('iban') }}" required autocomplete="iban">
                            @error('iban')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-5">
                            <button type="submit" class="btn primary-btn">
                                {{ __('Registrar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
