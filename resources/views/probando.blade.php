<h1>


</h1>

<h2>

</h2>

<form action='{{ route('desconectar') }}' method='POST'>
    @csrf
    <button type='submit'>Desconectar</button>
</form>
