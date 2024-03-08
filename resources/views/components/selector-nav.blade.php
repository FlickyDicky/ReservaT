@if (Cookie::get('cliente_tipo') == 'E')
    <x-navbar-empresa/>
    @else
    <x-navbar-cliente />
@endif
