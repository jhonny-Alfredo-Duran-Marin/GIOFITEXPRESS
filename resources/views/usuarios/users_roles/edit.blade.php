@extends('adminlte::page')
@section('title','Asignar Roles')
@section('content_header') <h1>Asignar Roles: {{ $user->name }}</h1> @stop

@section('content')
<x-adminlte-card>
  <form method="POST" action="{{ route('users.roles.update',$user) }}">
    @csrf @method('PUT')

    <div class="row">
      @foreach($roles as $r)
      <div class="col-md-4">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="roles[]" id="role_{{ $r->id }}"
                 value="{{ $r->name }}" {{ in_array($r->name,$selected) ? 'checked' : '' }}>
          <label class="form-check-label" for="role_{{ $r->id }}">{{ $r->name }}</label>
        </div>
      </div>
      @endforeach
    </div>

    <div class="mt-3">
      <a href="{{ route('users.roles.index') }}" class="btn btn-secondary">Cancelar</a>
      <button class="btn btn-primary">Guardar</button>
    </div>
  </form>
</x-adminlte-card>
@stop
