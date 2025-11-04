<?php

namespace App\Models\usuarios;

use App\Models\disciplinas\Disciplina;
use App\Models\disciplinas\Reserva;
use App\Models\seguimiento\Antecedente;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = [
        'ci',
        'nombre',
        'telefono',
        'sexo',
        'nacimiento',
        'tipo',
        'especialidad',
        'cargo',
        'turno'
    ];

    // Relación con usuario
    public function user()
    {
        return $this->hasOne(User::class);
    }

    // 👉 1️⃣ Cliente — tiene muchos antecedentes clínicos
    public function antecedentes()
    {
        return $this->hasMany(Antecedente::class, 'cliente_id');
    }

    // 👉 2️⃣ Nutricionista — realiza muchos antecedentes
    public function antecedentesRealizados()
    {
        return $this->hasMany(Antecedente::class, 'nutricionista_id');
    }

   


       public function reservas()
    {
        return $this->hasMany(Reserva::class, 'cliente_id');
    }


    public function disciplinas()
    {
        return $this->hasMany(Disciplina::class, 'instructor_id');
    }




    // =========================
    // 🔹 ACCESORES / UTILES
    // =========================

    public function getEdadAttribute()
    {
        return \Carbon\Carbon::parse($this->nacimiento)->age;
    }

    public function getNombreCompletoAttribute()
    {
        return "{$this->nombre} ({$this->tipo})";
    }

    public function scopeClientes($query)
    {
        return $query->where('tipo', 'CLIENTE');
    }

    public function scopeInstructores($query)
    {
        return $query->where('tipo', 'INSTRUCTOR');
    }

    public function scopeNutricionistas($query)
    {
        return $query->where('tipo', 'NUTRICIONISTA');
    }

    public function scopeAdministrativos($query)
    {
        return $query->where('tipo', 'ADMINISTRATIVO');
    }
}
