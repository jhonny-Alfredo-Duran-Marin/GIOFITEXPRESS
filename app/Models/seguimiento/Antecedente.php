<?php

namespace App\Models\seguimiento;

use Illuminate\Database\Eloquent\Model;

class Antecedente extends Model
{
    protected $fillable = [
        'cliente_id',
        'nutricionista_id',
        'fecha',
        'diagnostico',
        'recomendaciones',
        'objetivo',
        'peso',
        'altura',
        'imc',
        'gc',
        'mm',
        'fecha_prox_consulta'
    ];

    public function cliente()
    {
        return $this->belongsTo(\App\Models\usuarios\Persona::class, 'cliente_id');
    }

    public function nutricionista()
    {
        return $this->belongsTo(\App\Models\usuarios\Persona::class, 'nutricionista_id');
    }
}
