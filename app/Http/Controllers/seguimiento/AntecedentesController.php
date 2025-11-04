<?php

namespace App\Http\Controllers\seguimiento;

use App\Http\Controllers\Controller;
use App\Models\seguimiento\Antecedente;
use App\Models\usuarios\Persona;
use Illuminate\Http\Request;

class AntecedentesController extends Controller
{
    public function index()
    {
        $antecedentes = Antecedente::with(['cliente', 'nutricionista'])->latest()->get();
        return view('seguimiento.antecedentes.index', compact('antecedentes'));
    }

    public function create()
    {
        $clientes = Persona::where('tipo', 'CLIENTE')->get();
        $nutricionistas = Persona::where('tipo', 'NUTRICIONISTA')->get();
        return view('seguimiento.antecedentes.create', compact('clientes', 'nutricionistas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'cliente_id' => 'required|exists:personas,id',
            'nutricionista_id' => 'required|exists:personas,id',
            'fecha' => 'required|date',
            'diagnostico' => 'nullable|string|max:255',
            'recomendaciones' => 'nullable|string',
            'objetivo' => 'nullable|string|max:255',
            'peso' => 'nullable|numeric|min:0',
            'altura' => 'nullable|numeric|min:0',
            'imc' => 'nullable|numeric|min:0',
            'gc' => 'nullable|numeric|min:0',
            'mm' => 'nullable|numeric|min:0',
            'fecha_prox_consulta' => 'nullable|date|after_or_equal:fecha',
        ]);

        Antecedente::create($data);
        return redirect()->route('antecedentes.index')->with('success', 'Antecedente clínico registrado correctamente.');
    }

    public function edit(Antecedente $antecedente)
    {
        $clientes = Persona::where('tipo', 'CLIENTE')->get();
        $nutricionistas = Persona::where('tipo', 'NUTRICIONISTA')->get();
        return view('seguimiento.antecedentes.edit', compact('antecedente', 'clientes', 'nutricionistas'));
    }

    public function update(Request $request, Antecedente $antecedente)
    {
        $data = $request->validate([
            'cliente_id' => 'required|exists:personas,id',
            'nutricionista_id' => 'required|exists:personas,id',
            'fecha' => 'required|date',
            'diagnostico' => 'nullable|string|max:255',
            'recomendaciones' => 'nullable|string',
            'objetivo' => 'nullable|string|max:255',
            'peso' => 'nullable|numeric|min:0',
            'altura' => 'nullable|numeric|min:0',
            'imc' => 'nullable|numeric|min:0',
            'gc' => 'nullable|numeric|min:0',
            'mm' => 'nullable|numeric|min:0',
            'fecha_prox_consulta' => 'nullable|date|after_or_equal:fecha',
        ]);

        $antecedente->update($data);
        return redirect()->route('antecedentes.index')->with('success', 'Antecedente actualizado correctamente.');
    }

    public function destroy(Antecedente $antecedente)
    {
        $antecedente->delete();
        return back()->with('success', 'Antecedente eliminado correctamente.');
    }
}
