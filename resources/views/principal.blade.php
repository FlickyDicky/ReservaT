

<h1> ¡Hola, {{ session('cliente')->nombre }}! </h1>
<h2> {{ session('cliente')->probarCosas() }} </h2> 
<!-- botón para cerrar sesión -->
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-primary">
        {{ __('Cerrar sesión') }}
    </button>
</form>

