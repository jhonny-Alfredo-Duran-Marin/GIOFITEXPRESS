<?php

namespace App\Models\administracion;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $fillable = [
        'nombre',
        'tipo',
        'valor',
        'estado',
        'fecha_ini',
        'fecha_fin',
        'descripcion'
    ];

    protected $casts = [
        'fecha_ini' => 'date',
        'fecha_fin' => 'date',
    ];
}
