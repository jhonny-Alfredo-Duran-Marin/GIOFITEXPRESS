<?php

namespace App\Http\Controllers\administracion;

use App\Http\Controllers\Controller;
use App\Models\administracion\Suscripcion;
use Illuminate\Http\Request;

class SuscripcionController extends Controller
{
    public function index()
    {
        $suscripciones = Suscripcion::all();
        return view('administracion.suscripcion.index', compact('suscripciones'));
    }

    public function create()
    {
        return view('administracion.suscripcion.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'duracion_dias' => 'required|integer|min:1'
        ]);

        Suscripcion::create($data);
        return redirect()->route('suscripciones.index')->with('success', 'Suscripción creada correctamente.');
    }

    public function edit(Suscripcion $suscripcion)
    {
        return view('administracion.suscripcion.edit', compact('suscripcion'));
    }

    public function update(Request $request, Suscripcion $suscripcion)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'duracion_dias' => 'required|integer|min:1'
        ]);

        $suscripcion->update($data);
        return redirect()->route('suscripciones.index')->with('success', 'Suscripción actualizada.');
    }

    public function destroy(Suscripcion $suscripcion)
    {
        $suscripcion->delete();
        return redirect()->route('suscripciones.index')->with('success', 'Suscripción eliminada.');
    }
}
