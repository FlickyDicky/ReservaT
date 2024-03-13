<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $fillable = [
        'empresa_id',
        'apertura',
        'cierre',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function servicios()
    {
        return $this->hasMany(Servicio::class);
    }
}
