<?php

namespace App\Http\Controllers\disciplinas;

use App\Http\Controllers\Controller;
use App\Models\disciplinas\Disciplina;
use App\Models\disciplinas\Reserva;
use App\Models\usuarios\Persona;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with(['cliente', 'disciplina.sala', 'disciplina.instructor', 'disciplina.horarios'])->get();
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        $clientes = Persona::where('tipo', 'CLIENTE')->get();
        $disciplinas = Disciplina::with(['sala', 'instructor'])->get();
        return view('reservas.create', compact('clientes', 'disciplinas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'cliente_id' => 'required|exists:personas,id',
            'disciplina_id' => 'required|exists:disciplinas,id',
            'fecha' => 'required|date',
            'estado' => 'required|in:Activo,Pasivo',
        ]);

        Reserva::create($data);
        return redirect()->route('reservas.index')->with('success', 'Reserva creada correctamente.');
    }

    public function edit(Reserva $reserva)
    {
        $clientes = Persona::where('tipo', 'CLIENTE')->get();
        $disciplinas = Disciplina::with(['sala', 'instructor'])->get();
        return view('reservas.edit', compact('reserva', 'clientes', 'disciplinas'));
    }

    public function update(Request $request, Reserva $reserva)
    {
        $data = $request->validate([
            'cliente_id' => 'required|exists:personas,id',
            'disciplina_id' => 'required|exists:disciplinas,id',
            'fecha' => 'required|date',
            'estado' => 'required|in:Activo,Pasivo',
        ]);

        $reserva->update($data);
        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada correctamente.');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return back()->with('success', 'Reserva eliminada correctamente.');
    }
}
