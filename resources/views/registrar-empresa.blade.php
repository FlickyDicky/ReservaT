<!-- formulario de registro con nombre apellido email telefono contraseña verificar contraseña-->
<form method="POST" action="{{ route('registrar_empresa') }}">
    @csrf
    <div class="form-group">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>
        <div class="col-md-6">
            <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>
            @error('apellido')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="empresa" class="col-md-4 col-form-label text-md-right">{{ __('Empresa') }}</label>
        <div class="col-md-6">
            <input id="empresa" type="text" class="form-control @error('empresa') is-invalid @enderror" name="empresa" value="{{ old('empresa') }}" required autocomplete="empresa" autofocus>
            @error('empresa')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="cif" class="col-md-4 col-form-label text-md-right">{{ __('CIF') }}</label>
        <div class="col-md-6">
            <input id="cif" type="text" class="form-control @error('cif') is-invalid @enderror" name="cif" value="{{ old('cif') }}" required autocomplete="cif" autofocus>
            @error('cif')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- ask for direccion-->
    <div class="form-group">
        <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>
        <div class="col-md-6">
            <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion" autofocus>
            @error('direccion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="municipio" class="col-md-4 col-form-label text-md-right">{{ __('Municipio') }}</label>
            <div class="col-md-6">
                <input id="municipio" type="text" class="form-control @error('municipio') is-invalid @enderror" name="municipio" value="{{ old('municipio') }}" required autocomplete="municipio" autofocus>
                @error('municipio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

    <div class="form-group">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>
        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="iban" class="col-md-4 col-form-label text-md-right">{{ __('IBAN') }}</label>
        <div class="col-md-6">
            <input id="iban" type="iban" class="form-control @error('iban') is-invalid @enderror" name="iban" value="{{ old('iban') }}" required autocomplete="iban">
            @error('iban')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    <div class="form-group">
        <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>
        <div class="col-md-6">
            <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
            @error('telefono')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Verificar Contraseña') }}</label>
        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>


    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Registrarse') }} 
            </button>
        </div>
