<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'telefono' => 'required|max:255',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = new User();
        $user->nombre = $request->nombre;
        $user->apellidos = $request->apellido;
        $user->email = $request->email;
        $user->direccion = $request->direccion;
        $user->municipio = $request->municipio;
        $user->telefono = $request->telefono;
        $user->password = Hash::make($request->password);
        $user->tipo = 'C';
        $user->save();
        return redirect()->route('login');
    }

    public function create()
    {
        return view('register-user');
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
                // Remove the '/storage/' prefix before deleting the file
                Storage::delete($user->foto);
            }


            // Store the newly uploaded photo
            $photoPath = $request->file('photo')->store('public/profile-photos');
            $user->foto = Storage::url($photoPath);
            if ($user instanceof User) {
                $user->save();
            }

            // Optionally, you can return a success message or redirect the user
            return redirect()->route('welcome')->with('success', 'Profile photo uploaded successfully.');
        } else {
            // Handle the case where the user does not exist
            return redirect()->back()->with('error', 'User not found.');
        }
    }

}
