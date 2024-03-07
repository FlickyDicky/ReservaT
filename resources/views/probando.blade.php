<h1>
    El nombre de usuario es {{ $nombre }}.

</h1>

<h2>

</h2>

<form action='{{ route('desconectar') }}' method='POST'>
    @csrf
    <button type='submit'>Desconectar</button>
</form>
