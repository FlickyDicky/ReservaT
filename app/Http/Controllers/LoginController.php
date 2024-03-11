<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Authentication successful
            $user = Auth::user();

            return redirect()->route('mostrar_datos');
        } else {
            // Authentication failed
            return redirect()->route('welcome');
        }
    }

    public function mostrar_datos()
    {
        $user = Auth::user();

        return view('welcome', [
            'nombre' => $user->nombre,
            'email' => $user->email,
            'foto_perfil' => $user->foto,
        ]);
    }

    public function mostrar_perfil()
    {
        $user = Auth::user();

        return view('perfil', [
            'nombre' => $user->nombre,
            'apellidos' => $user->apellidos,
            'email' => $user->email,
            'direccion' => $user->direccion,
        ]);
    }

    public function logout()
    {
        // Log out the authenticated user
        Auth::logout();

        return redirect()->route('welcome');
    }
}
