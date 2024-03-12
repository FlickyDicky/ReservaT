<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Servicio;

class ServicioController extends Controller
{
    //
    // public function create(){
    //     return view('servicios');
    // }

    public function create(){
        //coge los servicios asociados al id de esta empresa
        $servicios = Servicio::where('empresa_id', auth()->user()->empresa->id)->get();

        return view('servicios', compact('servicios'));
    }

    public function new_servicio()
    {
        return view('nuevo-servicio');
    }

    public function create_servicio(Request $request)
    {
        $servicio = new Servicio();
        $servicio->nombre = $request->nombre;
        $servicio->descripcion = $request->descripcion;
        $servicio->precio = $request->precio;
        $servicio->empresa_id = auth()->user()->empresa->id;
        $servicio->horario_id = auth()->user()->empresa->horario->id;
        $servicio->duracion = $request->duracion;
        $servicio->save();

        return redirect()->route('servicios');
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
