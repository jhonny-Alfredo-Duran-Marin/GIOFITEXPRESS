<?php

namespace App\Http\Controllers\disciplinas;

use App\Http\Controllers\Controller;
use App\Models\disciplinas\Disciplina;
use App\Models\disciplinas\Sala;
use App\Models\usuarios\Persona;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    public function index()
    {
        $disciplinas = Disciplina::with('sala')->get();

        return view('disciplinas.disciplina.index', compact('disciplinas',));
    }

    public function create()
    {
        $salas = Sala::all();
        $instructor = Persona::where('tipo', 'INSTRUCTOR')->get();
        return view('disciplinas.disciplina.create', compact('salas', 'instructor'));
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'nombre' => 'required|string|max:100',
            'grupo' => 'required|string|max:100',
            'cupo' => 'required|integer|min:1',
            'sala_id' => 'required|exists:salas,id',
            'instructor_id' => 'required|exists:personas,id'
        ]);
        Disciplina::create($data);
        return redirect()->route('disciplinas.index')->with('success', 'Disciplina creada correctamente.');
    }

    public function edit(Disciplina $disciplina)
    {
        $salas = Sala::all();
        $instructor = Persona::where('tipo', 'INSTRUCTOR')->get();
        return view('disciplinas.disciplina.edit', compact('disciplina', 'salas','instructor'));
    }

    public function update(Request $r, Disciplina $disciplina)
    {
        $data = $r->validate([
            'nombre' => 'required|string|max:100',
            'grupo' => 'required|string|max:100',
            'cupo' => 'required|integer|min:1',
            'sala_id' => 'required|exists:salas,id'
        ]);
        $disciplina->update($data);
        return redirect()->route('disciplinas.index')->with('success', 'Disciplina actualizada.');
    }

    public function destroy(Disciplina $disciplina)
    {
        $disciplina->delete();
        return back()->with('success', 'Disciplina eliminada.');
    }
}
