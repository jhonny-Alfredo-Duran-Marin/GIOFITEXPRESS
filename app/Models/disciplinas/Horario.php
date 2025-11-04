<?php

namespace App\Models\disciplinas;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = ['disciplina_id', 'dia', 'hora_ini', 'hora_fin'];

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }
}
