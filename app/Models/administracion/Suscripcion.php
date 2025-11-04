<?php

namespace App\Models\administracion;

use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'precio', 'duracion_dias'];

    public function clientes()
    {
        return $this->belongsToMany(\App\Models\usuarios\Persona::class, 'cliente_suscripcion');
    }
}
