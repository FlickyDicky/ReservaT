
    <form method="POST" action="{{ route('conectar') }}">
        @csrf

        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required autofocus>
            <!-- si el email no es correcto-->
            @error('email')
                <span>
                    <strong>Not valid email</strong>
                </span>
            @enderror
        </div>

        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
        </div>

        <div>
            <button type="submit">
                Log in
            </button>
        </div>
        <div>
            <a href="{{ route('registro.usuario') }}">¿No tienes cuenta? Crea una aquí.</a>
        </div>
    </form>

