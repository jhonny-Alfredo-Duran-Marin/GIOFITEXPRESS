<?php

namespace App\Http\Controllers\usuarios;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string)$request->get('q'));
        $users = User::when($q, fn($qq)=>$qq->where('name','like',"%$q%")->orWhere('email','like',"%$q%"))
            ->with('roles')->orderBy('name')->paginate(10)->withQueryString();

        return view('usuarios.users_roles.index', compact('users','q'));
    }

    public function edit(User $user)
    {
        $roles = Role::orderBy('name')->get();
        $selected = $user->roles->pluck('name')->toArray();
        return view('usuarios.users_roles.edit', compact('user','roles','selected'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate(['roles'=>'array','roles.*'=>'string']);
        $user->syncRoles($request->input('roles', [])); // ← asigna roles al usuario
        return redirect()->route('users.roles.index')->with('success','Roles asignados al usuario.');
    }
}
