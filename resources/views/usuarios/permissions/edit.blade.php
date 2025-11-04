@extends('adminlte::page')
@section('title','Editar Permiso')
@section('content_header') <h1>Editar Permiso</h1> @stop

@section('content')
<x-adminlte-card>
  <form method="POST" action="{{ route('permissions.update',$permission) }}">
    @csrf @method('PUT')
    <div class="form-group">
      <label>Nombre del permiso</label>
      <input name="name" value="{{ old('name',$permission->name) }}" class="form-control" required>
      @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Cancelar</a>
    <button class="btn btn-primary">Guardar</button>
  </form>
</x-adminlte-card>
@stop
