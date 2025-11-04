@extends('adminlte::page')
@section('title','Usuarios & Roles')
@section('content_header') <h1>Asignar Roles a Usuarios</h1> @stop

@section('content')
@if(session('success')) <x-adminlte-alert theme="success" title="Ok">{{ session('success') }}</x-adminlte-alert> @endif

<div class="d-flex justify-content-between mb-2">
  <form method="GET">
    <div class="input-group">
      <input name="q" value="{{ $q }}" class="form-control" placeholder="Buscar nombre o email...">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary">Buscar</button>
      </div>
    </div>
  </form>
</div>

<x-adminlte-card>
  <table class="table table-sm table-hover">
    <thead>
      <tr>
        <th>Usuario</th>
        <th>Email</th>
        <th>Roles</th>
        <th class="text-right">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse($users as $u)
      <tr>
        <td>{{ $u->name }}</td>
        <td>{{ $u->email }}</td>
        <td>{{ $u->roles->pluck('name')->join(', ') ?: '—' }}</td>
        <td class="text-right">
          @can('roles.update')
          <a class="btn btn-xs btn-primary" href="{{ route('users.roles.edit',$u) }}">Asignar</a>
          @endcan
        </td>
      </tr>
      @empty
      <tr><td colspan="4">Sin datos</td></tr>
      @endforelse
    </tbody>
  </table>
  {{ $users->links() }}
</x-adminlte-card>
@stop
