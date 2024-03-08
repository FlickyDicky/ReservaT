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

    public function probarCosas()
    {
        return 'El nombre del cliente es ' . $this->nombre . ', su email es ' . $this->email . ' y su teléfono es ' . $this->telefono . '.';
    }
}
