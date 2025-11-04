<?php

namespace App\Http\Controllers\usuarios;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\usuarios\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::with('user')->get();
        return view('usuarios.personas.index', compact('personas'));
    }

    public function create()
    {
        return view('usuarios.personas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ci' => 'nullable|string|max:20',
            'nombre' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'sexo' => ['required', Rule::in(['F', 'M'])],
            'nacimiento' => 'required|date',
            'tipo' => ['required', Rule::in(['ADMINISTRATIVO', 'NUTRICIONISTA', 'INSTRUCTOR', 'CLIENTE'])],
            'especialidad' => 'nullable|string|max:100',
            'cargo' => 'nullable|string|max:100',
            'turno' => ['nullable', Rule::in(['MAÑANA', 'TARDE', 'NOCHE'])],
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        // Crear persona
        $persona = Persona::create($validated);

        // Crear usuario vinculado
        $user = User::create([
            'name' => $validated['nombre'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'persona_id' => $persona->id
        ]);

     

        return redirect()->route('personas.index')->with('success', 'Persona y usuario creados correctamente.');
    }

    public function show(Persona $persona)
    {
        return view('usuarios.personas.show', compact('persona'));
    }

    public function edit(Persona $persona)
    {
        return view('usuarios.personas.edit', compact('persona'));
    }

    public function update(Request $request, Persona $persona)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'sexo' => ['required', Rule::in(['F', 'M'])],
            'nacimiento' => 'required|date',
            'tipo' => ['required', Rule::in(['ADMINISTRATIVO', 'NUTRICIONISTA', 'INSTRUCTOR', 'CLIENTE'])],
            'especialidad' => 'nullable|string|max:100',
            'cargo' => 'nullable|string|max:100',
            'turno' => ['nullable', Rule::in(['MAÑANA', 'TARDE', 'NOCHE'])],
        ]);

        $persona->update($validated);

        // Actualiza también el usuario asociado si es necesario
        if ($persona->user) {
            $persona->user->update(['name' => $persona->nombre]);
        }

        return redirect()->route('personas.index')->with('success', 'Persona actualizada correctamente.');
    }

    public function destroy(Persona $persona)
    {
        $persona->delete();
        return redirect()->route('personas.index')->with('success', 'Persona eliminada correctamente.');
    }
}
