<x-selector-nav></x-selector-nav>

<form action="{{ route ('create_servicio')}}" method='POST'>
    @csrf
    <label for="nombre">Nombre del Servicio</label>
    <input type="text" name="nombre" id="nombre" required>
    <label for="descripcion">Descripcion del Servicio</label>
    <textarea type="text" name="descripcion" id="descripcion" placeholder="Descripción del servicio..." required>
    </textarea>
    <label for="precio">Precio del Servicio</label>
    <input type="number" name="precio" id="precio" required> €
    <label for="duracion">Duración del Servicio</label>
    <input type="number" name="duracion" id="duracion" required> minutos
    <button type="submit">Crear un nuevo servicio</button>

</form>
