@extends('adminlte::page')

@section('title', 'Reservas')

@section('content_header')
    <h1>Gestión de Reservas</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between">
        <span>Listado de Reservas</span>
        <a href="{{ route('reservas.create') }}" class="btn btn-light btn-sm"><i class="fas fa-plus"></i> Nueva Reserva</a>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Cliente</th>
                    <th>Disciplina</th>
                    <th>Instructor</th>
                    <th>Sala</th>
                    <th>Horarios</th>
                    <th>Fecha Reserva</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $r)
                <tr>
                    <td>{{ $r->cliente->nombre }}</td>
                    <td>{{ $r->disciplina->nombre }}</td>
                    <td>{{ $r->disciplina->instructor->nombre ?? '—' }}</td>
                    <td>{{ $r->disciplina->sala->descripcion ?? '—' }}</td>
                    <td>
                        @if($r->disciplina->horarios->count())
                            <ul class="m-0">
                                @foreach($r->disciplina->horarios as $h)
                                    <li>{{ $h->dia }}: {{ $h->hora_ini }} - {{ $h->hora_fin }}</li>
                                @endforeach
                            </ul>
                        @else
                            <em>Sin horarios</em>
                        @endif
                    </td>
                    <td>{{ $r->fecha }}</td>
                    <td>
                        <span class="badge bg-{{ $r->estado == 'Activo' ? 'success' : 'secondary' }}">{{ $r->estado }}</span>
                    </td>
                    <td>
                        <a href="{{ route('reservas.edit', $r) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('reservas.destroy', $r) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar reserva?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
