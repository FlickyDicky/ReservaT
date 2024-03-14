<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    //create the perfil view
    public function create()
    {

        $user = Auth::user();
        return view('editar-perfil', ['user', $user]);
    }

    //update the perfil
    public function update(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'email' => 'required|email|max:255',
            'direccion' => 'required|max:255',
            'telefono' => 'required|max:255',
            'nombre_empresa' => 'required_if:tipo,E|max:255',
            'cif' => 'required_if:tipo,E|max:255',
            'iban' => 'required_if:tipo,E|max:255',
        ]);

        $user = Auth::user();
        $user->nombre = $request->nombre;
        $user->apellidos = $request->apellidos;
        $user->email = $request->email;
        $user->direccion = $request->direccion;
        $user->telefono = $request->telefono;
        if ($user->tipo == 'E') {
            $empresa = $user->empresa;
            $empresa->nombre_empresa = $request->nombre_empresa;
            $empresa->cif = $request->cif;
            $empresa->iban = $request->iban;
            $empresa->save();
        }

        if ($user instanceof User) {
            $user->save();
        }

        return redirect()->route('welcome', auth()->user());
    }

    public function destroy()
    {
        $user = Auth::user();
        if ($user instanceof User) {
            if ($user->tipo == 'E') {
                $user->empresa->delete();
            }
            $user->delete();
        }
        return redirect()->route('welcome');
    }
}
