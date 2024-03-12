@if (Auth::check())
    @if (Auth::user()->tipo == 'E')
        <x-navbar-empresa />
    @else
        <x-navbar-cliente />
    @endif
@else
    <x-navbar-cliente />
@endif
