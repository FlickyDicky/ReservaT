@extends('layout')

@section('title', '¡Bienvenido a reserva·T')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action='{{ route('profile.update')}}' method='POST'>
        @csrf
        <label for='name'>Nombre:</label>
        <input type='text' name='nombre' id='nombre' value='{{auth()->user()->nombre}}' placeholder="{{auth()->user()->nombre}}">
        <label for='apellidos'>Apellidos:</label>
        <input type='text' name='apellidos' id='apellidos' value='{{auth()->user()->apellidos}}' placeholder='{{auth()->user()->apellidos}}'>
        <label for='email'>Email:</label>
        <input type='text' name='email' id='email' value='{{auth()->user()->email}}' placeholder='{{auth()->user()->email}}'>
        <label for='telefono'>Telefono:</label>
        <input type='text' name='telefono' id='telefono' value='{{auth()->user()->telefono}}' placeholder='{{auth()->user()->telefono}}'>
        <label for='direccion'>Direccion:</label>
        <input type='text' name='direccion' id='direccion' value='{{auth()->user()->direccion}}' placeholder='{{auth()->user()->direccion}}'>

        @if (auth()->user()->tipo == 'E')
            <label for='nombre_empresa'>Nombre de empresa:</label>
            <input type='text' name='nombre_empresa' id='nombre_empresa' value='{{auth()->user()->empresa->nombre_empresa}}' placeholder='{{auth()->user()->empresa->nombre_empresa}}'>
            <label for='cif'>CIF:</label>
            <input type='text' name='cif' id='cif' value='{{auth()->user()->empresa->cif}}' placeholder='{{auth()->user()->empresa->cif}}'>
            <label for='iban'>IBAN</label>
            <input type='text' name='iban' id='iban' value='{{auth()->user()->empresa->iban}}' placeholder='{{auth()->user()->empresa->iban}}'>
        @endif

        <button type='submit'>Editar</button>
    </form>
    <form action="{{ route('photo.upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="photo" accept="image/*">
        <button type="submit">Upload Photo</button>
    </form>

@endsection

