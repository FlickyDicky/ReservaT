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

        $cliente = \App\Models\Usuario::where('email', $credentials['email'])->first();

        if($cliente) {
            if(\Illuminate\Support\Facades\Hash::check($credentials['password'], $cliente->password)) {
                Cookie::queue('cliente_nombre', $cliente->nombre, 5);
                Cookie::queue('cliente_email', $cliente->email, 5);
                Cookie::queue('cliente_apellidos', $cliente->apellidos, 5);
                Cookie::queue('cliente_telefono', $cliente->telefono, 5);
                Cookie::queue('cliente_direccion', $cliente->direccion, 5);
                Cookie::queue('cliente_municipio', $cliente->tipo, 5);
                Cookie::queue('cliente_tipo', $cliente->tipo, 5);

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
        $email = Cookie::get('cliente_email');
        return view('welcome',['nombre' => $nombre, 'email' => $email]);
    }

    function mostrar_perfil(){
        $nombre = Cookie::get('cliente_nombre');
        $apellidos = Cookie::get('cliente_apellidos');
        $email = Cookie::get('cliente_email');
        $direccion = Cookie::get('cliente_direccion');

        return view('perfil',['nombre' => $nombre, 'email' => $email, 'apellidos' => $apellidos, 'direccion' => $direccion]);
    }

    function logout()
    {
        //forget todas las Cookie
        Cookie::queue(Cookie::forget('cliente_nombre'));
        Cookie::queue(Cookie::forget('cliente_email'));
        Cookie::queue(Cookie::forget('cliente_apellidos'));
        Cookie::queue(Cookie::forget('cliente_telefono'));
        Cookie::queue(Cookie::forget('cliente_direccion'));
        Cookie::queue(Cookie::forget('cliente_tipo'));
        Cookie::queue(Cookie::forget('cliente_municipio'));

        return redirect()->route('welcome');
    }
}

