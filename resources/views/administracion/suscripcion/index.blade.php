@extends('adminlte::page')

@section('title', 'Suscripciones')

@section('content_header')
    <h1>Gestión de Suscripciones</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between">
        <span>Listado de Suscripciones</span>
        <a href="{{ route('suscripciones.create') }}" class="btn btn-light btn-sm">
            <i class="fas fa-plus"></i> Nueva Suscripción
        </a>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th><th>Nombre</th><th>Precio</th><th>Duración (días)</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suscripciones as $suscripcion)
                    <tr>
                        <td>{{ $suscripcion->id }}</td>
                        <td>{{ $suscripcion->nombre }}</td>
                        <td>{{ $suscripcion->precio }} Bs</td>
                        <td>{{ $suscripcion->duracion_dias }}</td>
                        <td>
                            <a href="{{ route('suscripciones.edit', $suscripcion) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('suscripciones.destroy', $suscripcion) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('¿Eliminar suscripción?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
