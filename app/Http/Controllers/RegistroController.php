<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegistroController extends Controller
{

    public function registrar_cliente(Request $request)
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
        $cliente->tipo = 'C';
        $cliente->save();
        echo "Cliente registrado correctamente";
        return redirect()->route('welcome');
    }


}
?>
