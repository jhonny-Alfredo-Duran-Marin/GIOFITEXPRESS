@extends('adminlte::page')

@section('title', 'Editar Suscripción')

@section('content_header')
    <h1>Editar Suscripción</h1>
@stop

@section('content')
<div class="card card-warning">
    <div class="card-header"><h3 class="card-title"><i class="fas fa-edit"></i> Editar</h3></div>
    <form action="{{ route('suscripciones.update', $suscripcion) }}" method="POST">@csrf @method('PUT')
        <div class="card-body">
            <x-adminlte-input name="nombre" label="Nombre" value="{{ $suscripcion->nombre }}" required/>
            <x-adminlte-textarea name="descripcion" label="Descripción">{{ $suscripcion->descripcion }}</x-adminlte-textarea>
            <x-adminlte-input name="precio" type="number" step="0.01" label="Precio (Bs)" value="{{ $suscripcion->precio }}" required/>
            <x-adminlte-input name="duracion_dias" type="number" label="Duración en días" value="{{ $suscripcion->duracion_dias }}" required/>
        </div>
        <div class="card-footer">
            <x-adminlte-button type="submit" theme="warning" label="Actualizar" icon="fas fa-sync"/>
            <a href="{{ route('suscripciones.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>
@stop
