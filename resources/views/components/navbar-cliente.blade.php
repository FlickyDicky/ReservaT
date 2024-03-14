<nav>
    <li><a href="{{ route('welcome') }}"><img src="{{ asset('img/logo-negativo.svg') }}" class="nav-logo" alt=""></a></li>
    <ul class="nav-links">
        @if (Auth::check())
            <li><a href="{{ route('profile.create', ['user' => auth()->user()->id]) }}">Dashboard</a></li>
            <li><a href="{{ route('logout') }}">Desconectar</a></li>
        @else
            <li><a href="{{ route('login.create') }}">Login</a></li>


            <li><a href="{{ route('register.create') }}">Register</a></li>
        @endif
        <li><a href="/about">About</a></li>
        <form action="{{ route('company.create') }}">
            <button>¿TIENES UNA EMPRESA?</button>
        </form>
    </ul>
    <div class="burger" onclick="toggleMenu()">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
    <ul class="drop-down">
        @if (Auth::check())
            <li><a href="{{ route('profile.create', ['user' => auth()->user()->id]) }}">Dashboard</a></li>
            <li><a href="{{ route('logout') }}">Desconectar</a></li>
        @else
            <li><a href="{{ route('login.create') }}">Login</a></li>

            <li><a href="{{ route('register.create') }}">Register</a></li>
        @endif
        <li><a href="/about">About</a></li>
        <li><a href=" {{ route('company.create')}}">¿Tienes una empresa?</a></li>
    </ul>
</nav>
<script defer>
    function toggleMenu() {
        const menu = document.querySelector('.drop-down');
        menu.classList.toggle('active');
    }
    // rule for when the page goes beyond 600px the class active is removed form dop-down
    window.addEventListener('resize', () => {
        const menu = document.querySelector('.drop-down');
        if (window.innerWidth > 600) {
            menu.classList.remove('active');
        }
    });
</script>
