<nav>
    <ul>
        <li><a href=""><img src="{{ asset('img/logo-negativo.svg') }}" alt="" style="background-color: blue;"></a></li>
        @if (Route::has('login'))
            @auth
                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>

                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endauth
            @endif
        @endif
            <li><a href="/about">About</a></li>
    </ul>
</nav>
