<x-selector-nav></x-selector-nav>

<!-- Crear una tabla con todos los servicios-->
<form action="">
    <button>Crear un nuevo servicio</button>
</form>
<table>
    <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>
    @foreach ($servicios as $servicio)
        <tr>
            <td>{{$servicio->nombre}}</td>
            <td>{{$servicio->descripcion}}</td>
            <td>{{$servicio->precio}}</td>
            <td>
                <form action="">
                    {{-- <!--{{route('editar_servicio')}}--> --}}
                    <input type="hidden" name="id" value="{{$servicio->id}}">
                    <button>Editar</button>
                </form>
            </td>
            <td>
                {{-- <!-- {{route('eliminar_servicio')}}--> --}}
                <form action="">
                    <input type="hidden" name="id" value="{{$servicio->id}}">
                    <button>Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach





