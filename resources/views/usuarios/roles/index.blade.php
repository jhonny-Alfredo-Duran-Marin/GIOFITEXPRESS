@extends('adminlte::page')
@section('title','Roles')
@section('content_header') <h1>Roles</h1> @stop
@section('content')
@if(session('success')) <x-adminlte-alert theme="success" title="Ok">{{ session('success') }}</x-adminlte-alert> @endif
@if(session('error')) <x-adminlte-alert theme="danger" title="Error">{{ session('error') }}</x-adminlte-alert> @endif

<div class="d-flex justify-content-between mb-2">
  <form method="GET">
    <div class="input-group">
      <input name="q" value="{{ $q }}" class="form-control" placeholder="Buscar rol...">
      <div class="input-group-append"><button class="btn btn-outline-secondary">Buscar</button></div>
    </div>
  </form>
  @can('roles.create') <a href="{{ route('roles.create') }}" class="btn btn-primary">Nuevo Rol</a> @endcan
</div>

<x-adminlte-card>
  <table class="table table-sm table-hover">
    <thead><tr><th>Rol</th><th>Permisos</th><th class="text-right">Acciones</th></tr></thead>
    <tbody>
      @foreach($roles as $r)
      <tr>
        <td>{{ $r->name }}</td>
        <td>{{ $r->permissions()->count() }}</td>
        <td class="text-right">
          @can('roles.update') <a href="{{ route('roles.edit',$r) }}" class="btn btn-xs btn-info">Editar</a> @endcan
          @can('roles.delete')
          <form action="{{ route('roles.destroy',$r) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar rol?')">
            @csrf @method('DELETE')
            <button class="btn btn-xs btn-danger" {{ $r->name==='admin'?'disabled':'' }}>Eliminar</button>
          </form>
          @endcan
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $roles->links() }}
</x-adminlte-card>
@stop
