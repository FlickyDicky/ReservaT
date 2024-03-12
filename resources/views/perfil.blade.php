<p> Nombre: {{auth()->user()->nombre}}</p>
<p> Apellido: {{auth()->user()->apellidos}}</p>
<p> Email: {{auth()->user()->email}}</p>
<p> Telefono: {{auth()->user()->telefono}}</p>
<p> Direccion: {{auth()->user()->direccion}}</p>

@if (Auth::user()->tipo == 'E')
    <p> Nombre de empresa: {{auth()->user()->empresa->nombre_empresa }}</p>
    <p> CIF: {{auth()->user()->empresa->cif}}</p>
@endif

<form action="{{route('edicion_perfil')}}">
    <button>
        Editar perfil
    </button>
</form>

<form action="{{route('eliminar_perfil')}}" method="POST">
    @csrf
    <button>
        Eliminar perfil
    </button>
</form>

