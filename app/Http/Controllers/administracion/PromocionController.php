<?php

namespace App\Http\Controllers\administracion;

use App\Http\Controllers\Controller;
use App\Models\administracion\Promocion;
use Illuminate\Http\Request;

class PromocionController extends Controller
{
    public function index()
    {
        $promociones = Promocion::orderBy('fecha_ini', 'desc')->get();
        return view('administracion.promocion.index', compact('promociones'));
    }

    public function create()
    {
        return view('administracion.promocion.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|in:Porcentaje,Monto Fijo',
            'valor' => 'required|numeric|min:0',
            'estado' => 'required|in:Activo,Inactivo',
            'fecha_ini' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_ini',
            'descripcion' => 'nullable|string|max:500',
        ]);

        Promocion::create($data);
        return redirect()->route('promociones.index')->with('success', 'Promoción creada correctamente.');
    }

    public function edit(Promocion $promocione)
    {
        return view('a
        dministracion.promocion.edit', ['promocion' => $promocione]);
    }

    public function update(Request $request, Promocion $promocione)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|in:Porcentaje,Monto Fijo',
            'valor' => 'required|numeric|min:0',
            'estado' => 'required|in:Activo,Inactivo',
            'fecha_ini' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_ini',
            'descripcion' => 'nullable|string|max:500',
        ]);

        $promocione->update($data);
        return redirect()->route('promociones.index')->with('success', 'Promoción actualizada correctamente.');
    }

    public function destroy(Promocion $promocione)
    {
        $promocione->delete();
        return back()->with('success', 'Promoción eliminada correctamente.');
    }
}
