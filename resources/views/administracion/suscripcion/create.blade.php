@extends('adminlte::page')

@section('title', 'Nueva Suscripción')

@section('content_header')
    <h1>Registrar Suscripción</h1>
@stop

@section('content')
<div class="card card-success">
    <div class="card-header"><h3 class="card-title"><i class="fas fa-plus-circle"></i> Nueva Suscripción</h3></div>
    <form action="{{ route('suscripciones.store') }}" method="POST">@csrf
        <div class="card-body">
            <x-adminlte-input name="nombre" label="Nombre" required/>
            <x-adminlte-textarea name="descripcion" label="Descripción"/>
            <x-adminlte-input name="precio" type="number" step="0.01" label="Precio (Bs)" required/>
            <x-adminlte-input name="duracion_dias" type="number" label="Duración en días" required/>
        </div>
        <div class="card-footer">
            <x-adminlte-button type="submit" theme="success" label="Guardar" icon="fas fa-save"/>
            <a href="{{ route('suscripciones.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@stop
