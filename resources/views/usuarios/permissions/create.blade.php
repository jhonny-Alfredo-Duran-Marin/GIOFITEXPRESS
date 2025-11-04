@extends('adminlte::page')
@section('title','Crear Permiso')
@section('content_header') <h1>Crear Permiso</h1> @stop

@section('content')
<x-adminlte-card>
  <form method="POST" action="{{ route('permissions.store') }}">
    @csrf
    <div class="form-group">
      <label>Nombre del permiso</label>
      <input name="name" value="{{ old('name') }}" class="form-control" required placeholder="Ej: users.view">
      <small class="text-muted">Usa un patrón consistente (módulo.acción), ej: <code>users.create</code></small>
      @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Cancelar</a>
    <button class="btn btn-primary">Guardar</button>
  </form>
</x-adminlte-card>
@stop
