@extends('adminlte::page')
@section('title', 'Permisos')
@section('content_header') <h1>Permisos</h1> @stop

@section('content')
@if(session('success')) <x-adminlte-alert theme="success" title="Ok">{{ session('success') }}</x-adminlte-alert> @endif

<div class="d-flex justify-content-between mb-2">
  <form method="GET">
    <div class="input-group">
      <input name="q" value="{{ $q }}" class="form-control" placeholder="Buscar permiso...">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary">Buscar</button>
      </div>
    </div>
  </form>
  @can('permissions.create')
  <a href="{{ route('permissions.create') }}" class="btn btn-primary">Nuevo Permiso</a>
  @endcan
</div>

<x-adminlte-card>
  <table class="table table-sm table-hover">
    <thead>
      <tr>
        <th>Permiso</th>
        <th class="text-right">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse($permissions as $p)
      <tr>
        <td>{{ $p->name }}</td>
        <td class="text-right">
          @can('permissions.update')
          <a href="{{ route('permissions.edit',$p) }}" class="btn btn-xs btn-info">Editar</a>
          @endcan
          @can('permissions.delete')
          <form action="{{ route('permissions.destroy',$p) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar permiso?')">
            @csrf @method('DELETE')
            <button class="btn btn-xs btn-danger">Eliminar</button>
          </form>
          @endcan
        </td>
      </tr>
      @empty
      <tr><td colspan="2">Sin datos</td></tr>
      @endforelse
    </tbody>
  </table>
  {{ $permissions->links() }}
</x-adminlte-card>
@stop
