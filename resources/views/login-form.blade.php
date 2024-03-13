@extends('layout')

@section('title', 'Log in')

@section('content')
    
    <div class="container">
        <div class="form">
            <form method="POST" action="{{ route('login') }}" class="flex-item">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" required autofocus class="form-control">
                    <!-- si el email no es correcto-->
                    @error('email')
                        <span class="text-danger">
                            <strong>Not valid email</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn primary-btn">
                        Log in
                    </button>
                </div>
                <div class="form-group">
                    <a href="{{ route('register.create') }}" class="btn btn-link">¿No tienes cuenta? Crea una aquí.</a>
                </div>
            </form>
            <div class="form-img flex-item">
                {{-- logo showcase --}}
                <img src="{{ asset('img/logo-light.png') }}" alt="logo">
            </div>
        </div>
        
    </div>

@endsection
