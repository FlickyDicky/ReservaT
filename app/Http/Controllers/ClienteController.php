<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;


class ClienteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'apellido' => 'required|max:255',
            'email' => 'required|email|max:255|unique:usuarios',
            'telefono' => 'required|max:255',
            'password' => 'required|min:8|confirmed',
        ]);

        $cliente = new Usuario();
        $cliente->nombre = $request->name;
        $cliente->apellidos = $request->apellido;
        $cliente->email = $request->email;
        $cliente->direccion = $request->direccion;
        $cliente->municipio = $request->municipio;
        $cliente->telefono = $request->telefono;
        $cliente->password = Hash::make($request->password);

        if (Cookie::get('registro_empresa')){
            //cambiar el $cliente->tipo a E
            $cliente->tipo = 'E';

            $cliente->save();
            Cookie::queue('usuario_creado', 'true',5);
            $usuario = new Usuario;
            Cookie::queue('usuario_id', $usuario->buscarId($request->email),5);
            $cliente->save();
            return redirect()->route('registro.empresa'); // Redirige a la ruta 'registro.empresa'
        } else {
            $cliente->tipo = 'C';
            $cliente->save();
            return redirect()->route('welcome');
        }

    }

    public function create(){
        return view('registrar-cliente');
    }

    function mostrar_perfil(){
        $nombre = Cookie::get('cliente_nombre');
        $apellidos = Cookie::get('cliente_apellidos');
        $email = Cookie::get('cliente_email');
        $direccion = Cookie::get('cliente_direccion');
        $telefono = Cookie::get('cliente_telefono');
        $municipio = Cookie::get('cliente_municipio');
        if (Cookie::get('cliente_tipo') == 'E'){
        }


        return view('perfil',['nombre' => $nombre, 'email' => $email, 'apellidos' => $apellidos, 'direccion' => $direccion, 'telefono' => $telefono]);
    }

    function editar_perfil(){
        $nombre = Cookie::get('cliente_nombre');
        $apellidos = Cookie::get('cliente_apellidos');
        $email = Cookie::get('cliente_email');
        $direccion = Cookie::get('cliente_direccion');
        $telefono = Cookie::get('cliente_telefono');
        $municipio = Cookie::get('cliente_municipio');

        return view('editar-perfil',['nombre' => $nombre, 'email' => $email, 'apellidos' => $apellidos, 'direccion' => $direccion, 'telefono' => $telefono, 'municipio'=>$municipio]);
    }

    function update(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'apellidos' => 'required|max:255', // Cambiado de 'apellido' a 'apellidos'
            'email' => 'required|email|max:255',
            'telefono' => 'required|max:255',
            'direccion' => 'required|max:255',
            'municipio' => 'required|max:255', // Asegúrate de que este campo también esté validado si es necesario
        ]);

        $cliente = Usuario::find(Cookie::get('cliente_id'));
        if ($cliente) { // Verifica si el usuario existe antes de intentar actualizarlo
            $cliente->nombre = $request->name;
            $cliente->apellidos = $request->apellidos; // Cambiado de $request->apellido a $request->apellidos
            $cliente->email = $request->email;
            $cliente->direccion = $request->direccion;
            $cliente->municipio = $request->municipio;
            $cliente->telefono = $request->telefono;
            $cliente->save();
            Cookie::queue('cliente_id', $cliente->id, 5);
            Cookie::queue('cliente_nombre', $cliente->nombre, 5);
            Cookie::queue('cliente_email', $cliente->email, 5);
            Cookie::queue('cliente_apellidos', $cliente->apellidos, 5);
            Cookie::queue('cliente_telefono', $cliente->telefono, 5);
            Cookie::queue('cliente_direccion', $cliente->direccion, 5);
            Cookie::queue('cliente_municipio', $cliente->municipio, 5);
            return redirect()->route('mostrar_perfil');
        } else {
            // Maneja el caso en que el usuario no se encuentra, por ejemplo, redirigiendo a una página de error
            return redirect()->route('error');
        }
    }
}
