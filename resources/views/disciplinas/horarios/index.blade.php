@extends('adminlte::page')
@section('title', 'Horarios')
@section('content_header')
<h1>Gestión de Horarios</h1>
@stop
@section('content')
<div class="card">
  <div class="card-header bg-primary text-white d-flex justify-content-between">
    <span>Listado de Horarios</span>
    <a href="{{ route('horarios.create') }}" class="btn btn-light btn-sm"><i class="fas fa-plus"></i> Nuevo Horario</a>
  </div>
  <div class="card-body">
    @if(session('success'))<div class="alert alert-success">{{session('success')}}</div>@endif
    <table class="table table-striped">
      <thead class="table-dark"><tr><th>Disciplina</th><th>Día</th><th>Inicio</th><th>Fin</th><th>Acciones</th></tr></thead>
      <tbody>
        @foreach($horarios as $h)
        <tr>
          <td>{{ $h->disciplina->nombre }}</td>
          <td>{{ $h->dia }}</td>
          <td>{{ $h->hora_ini }}</td>
          <td>{{ $h->hora_fin }}</td>
          <td>
            <a href="{{ route('horarios.edit',$h) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
            <form action="{{ route('horarios.destroy',$h) }}" method="POST" style="display:inline">@csrf @method('DELETE')
              <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@stop
