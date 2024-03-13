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

    public function index()
    {
        //coge los servicios asociados al id de esta empresa
        $servicios = Servicio::where('empresa_id', auth()->user()->empresa->id)->get();

        return view('servicios', compact('servicios'));
    }

    public function create()
    {
        return view('form-servicio');
    }

    public function store(Request $request)
    {
        $servicio = new Servicio();
        $servicio->nombre = $request->nombre;
        $servicio->descripcion = $request->descripcion;
        $servicio->precio = $request->precio;
        $servicio->empresa_id = auth()->user()->empresa->id; //coge el id de la empresa
        $servicio->horario_id = auth()->user()->empresa->horario->id; //coge el horario asociado a la empresa
        $servicio->duracion = $request->duracion;
        $servicio->save();
        // if (auth()->user()->empresa->horario) {
        // } else {
        //     return redirect()->back()->withErrors(['horario' => 'La empresa no tiene un horario asociado.']);
        // }
        return redirect()->route('servicios');
    }

    // public function update(Request $request)
    // {
    //     $servicio = Servicio::find($request->id);
    //     return view('update-servicio', ['servicio' => $servicio]);
    // }

    public function update(Request $request)
    {
        $servicio = Servicio::find($request->id);

        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'precio' => 'required|numeric',
            'duracion' => 'required|numeric',
        ]);

        if ($servicio) {
            $servicio->nombre = $request->nombre;
            $servicio->descripcion = $request->descripcion;
            $servicio->precio = $request->precio;
            $servicio->duracion = $request->duracion;
            $servicio->save();
        }
        return redirect()->route('servicios');
    }

    public function destroy(Request $request)
    {
        $servicio = Servicio::find($request->id);
        if ($servicio) {
            $servicio->delete();
        }
        return redirect()->route('servicios');
    }
}
