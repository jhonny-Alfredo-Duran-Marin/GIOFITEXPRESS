<?php

namespace App\Http\Controllers\disciplinas;

use App\Http\Controllers\Controller;
use App\Models\disciplinas\Disciplina;
use App\Models\disciplinas\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::with('disciplina')->get();
        return view('disciplinas.horarios.index', compact('horarios'));
    }

    public function create()
    {
        $disciplinas = Disciplina::all();
        return view('disciplinas.horarios.create', compact('disciplinas'));
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'disciplina_id' => 'required|exists:disciplinas,id',
            'dia' => 'required|string',
            'hora_ini' => 'required',
            'hora_fin' => 'required|after:hora_ini'
        ]);
        Horario::create($data);
        return redirect()->route('horarios.index')->with('success', 'Horario creado.');
    }

    public function edit(Horario $horario)
    {
        $disciplinas = Disciplina::all();
        return view('disciplinas.horarios.edit', compact('horario', 'disciplinas'));
    }

    public function update(Request $r, Horario $horario)
    {
        $data = $r->validate([
            'disciplina_id' => 'required|exists:disciplinas,id',
            'dia' => 'required|string',
            'hora_ini' => 'required',
            'hora_fin' => 'required|after:hora_ini'
        ]);
        $horario->update($data);
        return redirect()->route('horarios.index')->with('success', 'Horario actualizado.');
    }

    public function destroy(Horario $horario)
    {
        $horario->delete();
        return back()->with('success', 'Horario eliminado.');
    }
}
