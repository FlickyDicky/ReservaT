
<x-selector-nav/>

<form action='{{ route('update')}}' method='post'>
    @csrf
    <label for='name'>Nombre:</label>
    <input type='text' name='name' id='name' value='{{$nombre}}' placeholder="{{$nombre}}">
    <label for='apellidos'>Apellidos:</label>
    <input type='text' name='apellidos' id='apellidos' value='{{$apellidos}}' placeholder='{{$apellidos}}'>
    <label for='email'>Email:</label>
    <input type='text' name='email' id='email' value='{{$email}}' placeholder='{{$email}}'>
    <label for='telefono'>Telefono:</label>
    <input type='text' name='telefono' id='telefono' value='{{$telefono}}' placeholder='{{$telefono}}'>
    <label for='direccion'>Direccion:</label>
    <input type='text' name='direccion' id='direccion' value='{{$direccion}}' placeholder='{{$direccion}}'>
    <label for='municipio'>Municipio:</label>
    <input type='text' name='municipio' id='municipio' value='{{$municipio}}' placeholder='{{$municipio}}'>
    {{-- @if(Cookie::get('cliente_tipo') == 'E')
        <label for='nombre_empresa'>Nombre de empresa:</label>
        <input type='text' name='nombre_empresa' id='nombre_empresa' value='{{$nombre_empresa}}' placeholder='{{$nombre_empresa}}'>
        <label for='cif'>CIF:</label>
        <input type='text' name='cif' id='cif' value='{{$cif}}' placeholder='{{$cif}}'>


    @endif --}}
    <button type='submit'>Editar</button>
</form>
