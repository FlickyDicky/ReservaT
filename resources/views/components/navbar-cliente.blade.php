<nav>
    <ul>
        <li><a href=""><img src="{{ asset('img/logo-negativo.svg') }}" alt="" style="background-color: blue;"></a></li>
        <!-- si existe una cookie con el nombre 'cliente' -->
        @if (Cookie::get('cliente_nombre'))

                <li><a href="{{ route('mostrar_perfil') }}">Dashboard</a></li>
                <form action='{{ route('desconectar') }}' method='POST'>
                    @csrf
                    <button type='submit'>Desconectar</button>
                </form>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>

                <li><a href="{{ route('registro') }}">Register</a></li>

        @endif
            <li><a href="/about">About</a></li>

    </ul>
</nav>
