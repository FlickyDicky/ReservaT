<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
class HorarioController extends Controller
{
    //
    public function index()
    {
        //coge el horario asociado al id de esta empresa
        $horario = Horario::where('empresa_id', auth()->user()->empresa->id)->get();
        return view('form-horario', ['horario' => $horario]);
    }

    public function show(Request $request)
    {
        $inicio = $request->input('inicio');
        $fin = $request->input('fin');
        //devuelve el componente horario que está dentro de components
        return view('components.horario', ['inicio' => $inicio, 'fin' => $fin]);

    }

}
