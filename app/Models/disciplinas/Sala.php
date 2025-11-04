<?php

namespace App\Models\disciplinas;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $fillable = ['descripcion', 'capacidad'];

    public function disciplinas()
    {
        return $this->hasMany(Disciplina::class);
    }
}
