<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;

class ReservaController extends Controller
{
    //
    public function index(){
        return view('form-reservas');
    }

    public function show(Request $request){
        $inicio = $request->input('inicio');
        $fin = $request->input('fin');


        $reservas = Reserva::whereBetween('fecha_reserva', [$inicio, $fin])->get();

        return view('form-reservas', compact('reservas'));
    }

    public function destroy($id){
        $reserva = Reserva::find($id);
        $reserva->delete();
        return redirect()->route('reservas.index');
    }
}
