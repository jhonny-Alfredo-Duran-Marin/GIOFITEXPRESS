@extends('adminlte::page')
@section('title', 'Disciplinas')
@section('content_header')
<h1>Gestión de Disciplinas</h1>
@stop
@section('content')
<div class="card">
  <div class="card-header bg-primary text-white d-flex justify-content-between">
    <span>Listado de Disciplinas</span>
    <a href="{{ route('disciplinas.create') }}" class="btn btn-light btn-sm"><i class="fas fa-plus"></i> Nueva Disciplina</a>
  </div>
  <div class="card-body">
    @if(session('success'))<div class="alert alert-success">{{session('success')}}</div>@endif
    <table class="table table-striped">
      <thead class="table-dark"><tr><th>Nombre</th><th>Grupo</th><th>Cupo</th><th>Sala</th><th>Acciones</th></tr></thead>
      <tbody>
        @foreach($disciplinas as $d)
        <tr>
          <td>{{ $d->nombre }}</td>
          <td>{{ $d->grupo }}</td>
          <td>{{ $d->cupo }}</td>
          <td>{{ $d->sala->descripcion }}</td>
          <td>{{ $d->instructor->nombre }}</td>
          <td>
            <a href="{{ route('disciplinas.edit',$d) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
            <form action="{{ route('disciplinas.destroy',$d) }}" method="POST" style="display:inline">@csrf @method('DELETE')
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
