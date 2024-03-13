<nav>
    <li><a href=""><img src="{{ asset('img/logo-negativo.svg') }}" class="nav-logo" alt=""></a></li>
    <ul class="nav-links">
        <li><a href="{{ route('profile.form.create') }}">Perfil</a></li>
        <li><a href="{{ route('servicios') }}">Servicios</a></li>
        <form action=" {{ route('desconectar')}}">
            <button>
                LOG OUT
            </button>
        </form>
    </ul>
    <div class="burger" onclick="toggleMenu()">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
    <ul class="drop-down">
        <li><a href="{{ route('profile.form.create') }}">Perfil</a></li>
        <li><a href="{{ route('servicios') }}">Servicios</a></li>
        <li><a href="{{ route('desconectar')}}">Log out</a></li>
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
