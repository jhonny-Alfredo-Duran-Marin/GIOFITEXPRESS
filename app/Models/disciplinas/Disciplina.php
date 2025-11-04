<?php

namespace App\Models\disciplinas;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $fillable = ['nombre', 'grupo', 'cupo', 'sala_id', 'instructor_id'];

    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }

    public function instructor()
    {
        return $this->belongsTo(\App\Models\usuarios\Persona::class, 'instructor_id');
    }
}
