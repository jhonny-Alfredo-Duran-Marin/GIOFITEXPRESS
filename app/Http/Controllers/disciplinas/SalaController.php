<?php

namespace App\Http\Controllers\disciplinas;

use App\Http\Controllers\Controller;
use App\Models\disciplinas\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
   public function index()
    {
        $salas = Sala::all();
        return view('disciplinas.salas.index', compact('salas'));
    }

    public function create()
    {
        return view('disciplinas.salas.create');
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'descripcion'=>'required|string|max:150',
            'capacidad'=>'required|integer|min:1'
        ]);
        Sala::create($data);
        return redirect()->route('salas.index')->with('success','Sala creada correctamente.');
    }

    public function edit(Sala $sala)
    {
        return view('disciplinas.salas.edit', compact('sala'));
    }

    public function update(Request $r, Sala $sala)
    {
        $data = $r->validate([
            'descripcion'=>'required|string|max:150',
            'capacidad'=>'required|integer|min:1'
        ]);
        $sala->update($data);
        return redirect()->route('salas.index')->with('success','Sala actualizada.');
    }

    public function destroy(Sala $sala)
    {
        $sala->delete();
        return back()->with('success','Sala eliminada.');
    }
}
