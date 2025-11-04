@extends('adminlte::page')

@section('title', 'Editar Sala')

@section('content_header')
    <h1>Editar Sala</h1>
@stop

@section('content')
<div class="card card-warning">
    <div class="card-header"><h3 class="card-title"><i class="fas fa-edit"></i> Editar Sala</h3></div>

    <form action="{{ route('salas.update', $sala) }}" method="POST">@csrf @method('PUT')
        <div class="card-body">
            <x-adminlte-input name="descripcion" label="Descripción" value="{{ $sala->descripcion }}" required />
            <x-adminlte-input name="capacidad" type="number" label="Capacidad" value="{{ $sala->capacidad }}" required />
        </div>
        <div class="card-footer">
            <x-adminlte-button type="submit" theme="warning" icon="fas fa-sync" label="Actualizar" />
            <a href="{{ route('salas.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>
@stop
