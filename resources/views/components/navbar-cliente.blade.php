<nav>
    <li><a href=""><img src="{{ asset('img/logo-negativo.svg') }}" class="nav-logo" alt=""></a></li>
    <ul>
        @if (Route::has('home'))
            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
        @else
            <li><a href="{{ route('login') }}">Login</a></li>

            @if (Route::has('register'))
                <li><a href="{{ route('register') }}">Register</a></li>
            @endif
        @endif
        <li><a href="/about">About</a></li>
    </ul>
</nav>
