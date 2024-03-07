<nav>
    <ul>
        <li><a href=""><img src="{{ asset('img/logo-negativo.svg') }}" alt="" style="background-color: blue;"></a></li>
        @if (Route::has('login'))
            @auth
                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>

                <li><a href="{{ route('registro') }}">Register</a></li>
            @endif
        @endif
            <li><a href="/about">About</a></li>
    </ul>
</nav>
