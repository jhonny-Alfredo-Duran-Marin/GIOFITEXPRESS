@extends('adminlte::page')

@section('title', 'Promociones')

@section('content_header')
    <h1>Gestión de Promociones</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between">
        <span>Listado de Promociones</span>
        <a href="{{ route('promociones.create') }}" class="btn btn-light btn-sm">
            <i class="fas fa-plus"></i> Nueva Promoción
        </a>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Valor</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($promociones as $p)
                <tr>
                    <td>{{ $p->nombre }}</td>
                    <td>{{ $p->tipo }}</td>
                    <td>
                        @if($p->tipo == 'Porcentaje')
                            {{ $p->valor }}%
                        @else
                            Bs {{ $p->valor }}
                        @endif
                    </td>
                    <td>{{ $p->fecha_ini->format('d/m/Y') }}</td>
                    <td>{{ $p->fecha_fin->format('d/m/Y') }}</td>
                    <td>
                        <span class="badge bg-{{ $p->estado == 'Activo' ? 'success' : 'secondary' }}">{{ $p->estado }}</span>
                    </td>
                    <td>
                        <a href="{{ route('promociones.edit', $p) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('promociones.destroy', $p) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar promoción?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
