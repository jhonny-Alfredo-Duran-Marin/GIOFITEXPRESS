<?php

namespace App\Http\Controllers\usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string)$request->get('q'));
        $roles = Role::when($q, fn($qq)=>$qq->where('name','like',"%$q%"))
            ->orderBy('name')->paginate(10)->withQueryString();
        return view('usuarios.roles.index', compact('roles','q'));
    }

    public function create()
    {
        $permissions = Permission::orderBy('name')->get();
        $grouped = $permissions->groupBy(fn($p)=> Str::before($p->name, '.')); // agrupa por prefijo
        return view('usuarios.roles.create', compact('grouped'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:60|unique:roles,name',
            'permissions' => 'array',
            'permissions.*' => 'string'
        ]);

        $role = Role::create(['name'=>$request->name, 'guard_name'=>'web']);
        $role->syncPermissions($request->input('permissions', [])); // ← asigna permisos al rol
        return redirect()->route('roles.index')->with('success','Rol creado y permisos asignados.');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::orderBy('name')->get();
        $grouped = $permissions->groupBy(fn($p)=> Str::before($p->name, '.'));
        $selected = $role->permissions->pluck('name')->toArray();
        return view('usuarios.roles.edit', compact('role','grouped','selected'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:60|unique:roles,name,'.$role->id,
            'permissions' => 'array',
            'permissions.*' => 'string'
        ]);

        $role->update(['name'=>$request->name]);
        $role->syncPermissions($request->input('permissions', [])); // ← re-asigna permisos
        return redirect()->route('roles.index')->with('success','Rol actualizado.');
    }

    public function destroy(Role $role)
    {
        if ($role->name === 'admin') {
            return back()->with('error','No se puede eliminar el rol admin.');
        }
        $role->delete();
        return redirect()->route('roles.index')->with('success','Rol eliminado.');
    }
}
