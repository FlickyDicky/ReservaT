<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


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

        return redirect()->route('perfil', auth()->user());
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
    public function uploadProfilePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:2048',
        ]);

        $user = Auth::user(); // Get the currently authenticated user

        if ($user) {
            // Check if the user already has a photo or the default value
            if ($user->foto !== '0') {
                // Get the full path to the file
                $filePath = public_path($user->foto);
                // Check if the file exists before attempting to delete
                if (file_exists($filePath)) {
                    try {
                        unlink($filePath);
                    } catch (\Exception $e) {
                        // Log the deletion error
                        Log::error('Failed to delete file: ' . $e->getMessage());
                    }
                }
            }

            // Store the newly uploaded photo
            $photoPath = $request->file('photo')->store('public/profile-photos');
            $user->foto = str_replace('public/', 'storage/', $photoPath);
            if ($user instanceof User) {
                $user->save();
            }

            // Optionally, you can return a success message or redirect the user
            return redirect()->route('profile.create', ['user' => auth()->id()]);
        } else {
            // Handle the case where the user does not exist
            return redirect()->back()->with('error', 'User not found.');
        }
    }
}
