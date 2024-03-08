<nav>
    <ul>
        <li><a href=""><img src="{{ asset('img/logo-negativo.svg') }}" alt="" style="background-color: blue;"></a></li>
        <!-- si existe una cookie con el nombre 'cliente' -->

                <li><a href="{{ route('mostrar_perfil') }}">Dashboard</a></li>
                <li><a href="">Servicios</a></li>
                <form action='{{ route('desconectar') }}' method='POST'>
                    @csrf
                    <button type='submit'>Desconectar</button>
                </form>

            <li><a href="/about">About</a></li>

    </ul>
</nav>
