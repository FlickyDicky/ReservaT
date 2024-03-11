<!-- formulario de registro con nombre apellido email telefono contraseña verificar contraseña-->
<form method="POST" action="{{ route('registrar_empresa') }}">
    @csrf
    <div class="form-group">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Empresa') }}</label>
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


    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Registrarse') }} 
            </button>
        </div>
