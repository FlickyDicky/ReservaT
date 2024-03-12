<x-selector-nav/>

<p> Nombre: {{$nombre}}
<p> Apellido: {{$apellidos}}</p>
<p> Email: {{$email}}</p>
<p> Telefono: {{$telefono}}</p>
<p> Direccion: {{$direccion}}</p>

@if (Auth::user()->tipo == 'E')
    <p> Nombre de empresa: {{$nombre_empresa }}</p>
    <p> CIF: {{$cif}}</p>
@endif

<form action="{{route('editar_perfil')}}">
    <button>
        Editar perfil
    </button>
</form>

