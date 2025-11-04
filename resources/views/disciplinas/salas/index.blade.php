@extends('adminlte::page')
@section('title', 'Salas')
@section('content_header')
<h1>Gestión de Salas</h1>
@stop
@section('content')
<div class="card">
  <div class="card-header bg-primary text-white d-flex justify-content-between">
    <span>Listado de Salas</span>
    <a href="{{ route('salas.create') }}" class="btn btn-light btn-sm"><i class="fas fa-plus"></i> Nueva Sala</a>
  </div>
  <div class="card-body">
    @if(session('success'))<div class="alert alert-success">{{session('success')}}</div>@endif
    <table class="table table-striped">
      <thead class="table-dark"><tr><th>Descripción</th><th>Capacidad</th><th>Acciones</th></tr></thead>
      <tbody>
        @foreach($salas as $s)
        <tr>
          <td>{{ $s->descripcion }}</td>
          <td>{{ $s->capacidad }}</td>
          <td>
            <a href="{{ route('salas.edit',$s) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
            <form action="{{ route('salas.destroy',$s) }}" method="POST" style="display:inline">@csrf @method('DELETE')
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
