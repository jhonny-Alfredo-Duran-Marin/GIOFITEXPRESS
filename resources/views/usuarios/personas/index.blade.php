@extends('adminlte::page')

@section('title', 'Personas')

@section('content_header')
    <h1><i class="fas fa-id-card"></i> Listado de Personas</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Gestión de Personas</h3>
            <a href="{{ route('personas.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Nueva Persona
            </a>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Sexo</th>
                        <th>Tipo</th>
                        <th>Email</th>
                        <th style="width: 150px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($personas as $persona)
                        <tr>
                            <td>{{ $persona->id }}</td>
                            <td>{{ $persona->nombre }}</td>
                            <td>{{ $persona->telefono }}</td>
                            <td>{{ $persona->sexo }}</td>
                            <td><span class="badge bg-info">{{ $persona->tipo }}</span></td>
                            <td>{{ $persona->user->email ?? '—' }}</td>
                            <td>
                                <a href="{{ route('personas.show', $persona->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('personas.edit', $persona->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('personas.destroy', $persona->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('¿Eliminar esta persona?')" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-muted">No hay personas registradas</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
