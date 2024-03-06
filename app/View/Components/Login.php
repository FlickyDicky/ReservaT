<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Login extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function login()
    {
        $credenciales = request(['email', 'password']);
        ///buscar todos los email y password en la tabla clientes
        $cliente = \App\Models\Cliente::where('email', $credenciales['email'])->where('password', $credenciales['password'])->first();
        //si el email del cliente coincide con el email ingresado
        if ($cliente) {
            //guardar el id del cliente en la sesion
            session(['cliente' => $cliente->id]);
            return redirect()->route('principal');
        }


    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.login');
    }
}
