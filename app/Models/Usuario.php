<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellidos',
        'telefono',
        'email',
        'direccion',
        'municipio',
        'password',
        'tipo'
    ];

    public function buscarId($email)
    {

        $usuario = Usuario::where('email', $email)->first();
        echo $usuario->id;
        return $usuario->id;
    }
}

