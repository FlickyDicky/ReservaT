<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\Hash;

class EmpresaController extends Controller
{
    //
    private function verificarCIF($cif) {
        $cif = strtoupper($cif);
        if (!preg_match('/^[ABCDEFGHJKLMNPQRSUVW][0-9]{7}[0-9A-J]$/', $cif)) {
            return false;
        }

        $numero = substr($cif, 1, 7);
        $numero = str_split($numero);
        $control = $cif[8];

        $suma = $numero[1] + $numero[3] + $numero[5];

        for ($i = 0; $i < 7; $i += 2) {
            $temp = (2 * $numero[$i]);
            $temp = floor($temp / 10) + ($temp % 10);
            $suma += $temp;
        }

        $n = 10 - ($suma % 10);

        if ($cif[0] == 'K' || $cif[0] == 'P' || $cif[0] == 'Q' || $cif[0] == 'S') {
            return ($control == chr(64 + $n));
        } else if ($cif[0] == 'A' || $cif[0] == 'B' || $cif[0] == 'E' || $cif[0] == 'H') {
            return ($control == $n);
        } else {
            return ($control == $n || $control == chr(64 + $n));
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'apellido' => 'required|max:255',
            'email' => 'required|email|max:255|unique:usuarios',
            'telefono' => 'required|max:255',
            'password' => 'required|min:8|confirmed',
            'cif' => 'required|max:255',
        ]);

        $cliente = new Empresa();
        $cliente->nombre = $request->name;
        $cliente->apellidos = $request->apellido;
        $cliente->email = $request->email;
        $cliente->direccion = $request->direccion;
        $cliente->municipio = $request->municipio;
        $cliente->telefono = $request->telefono;
        $cliente->password = Hash::make($request->password);
        $cif = $request->cif;
        if (!$this->verificarCIF($cif)) {
            return redirect()->back()->withErrors(['cif' => 'El CIF proporcionado no es válido.']);
        }
        $cliente->tipo = 'E';
        $cliente->save();
        echo "Empresa registrado correctamente";
        return redirect()->route('welcome');

        
    }

    public function create(){
        return view('registrar-empresa');
    }
}
