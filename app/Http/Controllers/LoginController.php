<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cookie;


class LoginController extends Controller
{


    function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        $cliente = \App\Models\Cliente::where('email', $credentials['email'])->first();

        if($cliente) {
            if(\Illuminate\Support\Facades\Hash::check($credentials['password'], $cliente->password)) {
                Cookie::queue('cliente_nombre', $cliente->nombre, 5);
                return redirect()->route('mostrar_datos'); // Redirige a la ruta 'mostrar_datos'
            } else {
                return redirect()->route('welcome');
            }
        } else {
            return redirect()->route('welcome');
        }
    }


    function mostrar_datos()
    {
        //dd(Cookie::get('cliente_nombre'));
        $nombre = Cookie::get('cliente_nombre');
        return view('probando',['nombre' => $nombre]);
    }

    function logout()
    {
        Cookie::queue(Cookie::forget('cliente_nombre'));
        Cookie::queue(Cookie::forget('cliente_email'));
        return redirect()->route('welcome');
    }
}

