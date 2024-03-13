<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_empresa',
        'cif',
        'iban'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function horario()
    {
        return $this->hasOne(Horario::class);
    }

}
