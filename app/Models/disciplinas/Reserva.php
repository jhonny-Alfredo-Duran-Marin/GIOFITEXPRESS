<?php

namespace App\Models\disciplinas;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
        'cliente_id',
        'disciplina_id',
        'fecha',
        'estado',
    ];

    public function cliente()
    {
        return $this->belongsTo(\App\Models\usuarios\Persona::class, 'cliente_id');
    }

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }
}
