@extends('adminlte::page')

@section('title', 'Nueva Sala')

@section('content_header')
    <h1>Registrar Nueva Sala</h1>
@stop

@section('content')
<div class="card card-success">
    <div class="card-header"><h3 class="card-title"><i class="fas fa-plus-circle"></i> Nueva Sala</h3></div>

    <form action="{{ route('salas.store') }}" method="POST">@csrf
        <div class="card-body">
            <x-adminlte-input name="descripcion" label="Descripción" placeholder="Ej. Sala de Spinning" required />
            <x-adminlte-input name="capacidad" type="number" min="1" label="Capacidad (personas)" required />
        </div>
        <div class="card-footer">
            <x-adminlte-button type="submit" theme="success" icon="fas fa-save" label="Guardar" />
            <a href="{{ route('salas.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@stop
