<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'telefono' => 'required|max:255',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = new User();
        $user->nombre = $request->nombre;
        $user->apellidos = $request->apellido;
        $user->email = $request->email;
        $user->direccion = $request->direccion;
        $user->municipio = $request->municipio;
        $user->telefono = $request->telefono;
        $user->password = Hash::make($request->password);
        $user->tipo = 'C';
        $user->save();
        return redirect()->route('login');
    }

    public function create()
    {
        return view('register-user');
    }

}
