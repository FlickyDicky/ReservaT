<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Http\Request;

class Login extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        //buscar el cliente y comprobar si existe
        $cliente = \App\Models\User::where('email', $credentials['email'])->first();
        if ($cliente) {
            //buscar la contraseña del cliente y comprobar si es correcta
            if (\Illuminate\Support\Facades\Hash::check($credentials['password'], $cliente->password)) {
                //si es correcta, iniciar sesión
                $request->session()->put('cliente', $cliente);
                return redirect()->route('principal');
            } else {
                //si no es correcta avisar del error
                return redirect()->route('loginForm');
            }
        } else {
            // Email doesn't exist
            return redirect()->route('welcome');
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
