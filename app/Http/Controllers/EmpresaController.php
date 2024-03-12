<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


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
            'cif' => 'required|max:255',
            'iban' => 'required|max:255',
        ]);

        $empresa = new Empresa();
        $empresa->nombre_empresa = $request->name;
        $empresa->user_id = Auth::id();
        $cif = $request->cif;
        if (!$this->verificarCIF($cif)) {
            return redirect()->back()->withErrors(['cif' => 'El CIF proporcionado no es válido.']);
        }
        $empresa->cif = $cif;
        $empresa->iban = $request->iban;
        $user = Auth::user();
        if ($user instanceof User) {
            // If the authenticated user is an instance of the User model
            $user->tipo = 'E';
            $user->save();
        }
        $empresa->save();
        return redirect()->route('welcome')->with('user', Auth::user());
    }

    public function create(){
        if (Auth::check()){
            return view('registrar-empresa');
        }else {
            return redirect()->route('login'); // Redirect to the login page
        }

    }
}
