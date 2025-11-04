<?php

namespace App\Http\Controllers\usuarios;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string)$request->get('q'));
        $permissions = Permission::when($q, fn($qq)=>$qq->where('name','like',"%$q%"))
            ->orderBy('name')->paginate(10)->withQueryString();

        return view('usuarios.permissions.index', compact('permissions','q'));
    }

    public function create()
    {
        return view('usuarios.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name'=>'required|string|max:100|unique:permissions,name']);
        Permission::create(['name'=>$request->name,'guard_name'=>'web']);
        return redirect()->route('permissions.index')->with('success','Permiso creado.');
    }

    public function edit(Permission $permission)
    {
        return view('usuarios.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate(['name'=>'required|string|max:100|unique:permissions,name,'.$permission->id]);
        $permission->update(['name'=>$request->name]);
        return redirect()->route('permissions.index')->with('success','Permiso actualizado.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')->with('success','Permiso eliminado.');
    }
}

