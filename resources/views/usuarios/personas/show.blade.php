@extends('adminlte::page')

@section('title', 'Detalles de Persona')

@section('content_header')
    <h1><i class="fas fa-user"></i> Detalles de Persona</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tr><th>Nombre</th><td>{{ $persona->nombre }}</td></tr>
            <tr><th>Teléfono</th><td>{{ $persona->telefono }}</td></tr>
            <tr><th>Sexo</th><td>{{ $persona->sexo }}</td></tr>
            <tr><th>Nacimiento</th><td>{{ $persona->nacimiento }}</td></tr>
            <tr><th>Tipo</th><td><span class="badge bg-info">{{ $persona->tipo }}</span></td></tr>
            <tr><th>CI</th><td>{{ $persona->ci }}</td></tr>
            <tr><th>Especialidad</th><td>{{ $persona->especialidad ?? '—' }}</td></tr>
            <tr><th>Cargo</th><td>{{ $persona->cargo ?? '—' }}</td></tr>
            <tr><th>Turno</th><td>{{ $persona->turno ?? '—' }}</td></tr>
            <tr><th>Email</th><td>{{ $persona->user->email ?? 'Sin cuenta' }}</td></tr>
        </table>

        <div class="text-end">
            <a href="{{ route('personas.edit', $persona->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
            <a href="{{ route('personas.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
        </div>
    </div>
</div>
@stop
