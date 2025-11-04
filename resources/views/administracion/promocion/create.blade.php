@extends('adminlte::page')

@section('title', 'Nueva Promoción')

@section('content_header')
    <h1>Registrar Nueva Promoción</h1>
@stop

@section('content')
<div class="card card-success">
    <div class="card-header"><h3 class="card-title"><i class="fas fa-plus-circle"></i> Nueva Promoción</h3></div>

    <form action="{{ route('promociones.store') }}" method="POST">@csrf
        <div class="card-body">
            <x-adminlte-input name="nombre" label="Nombre de Promoción" placeholder="Ej. Descuento verano" required />

            <div class="row">
                <x-adminlte-select name="tipo" label="Tipo" fgroup-class="col-md-4" required>
                    <option value="Porcentaje">Porcentaje</option>
                    <option value="Monto Fijo">Monto Fijo</option>
                </x-adminlte-select>

                <x-adminlte-input name="valor" label="Valor" type="number" step="0.01" min="0" fgroup-class="col-md-4" required />

                <x-adminlte-select name="estado" label="Estado" fgroup-class="col-md-4" required>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </x-adminlte-select>
            </div>

            <div class="row">
                <x-adminlte-input name="fecha_ini" type="date" label="Fecha Inicio" fgroup-class="col-md-6" required />
                <x-adminlte-input name="fecha_fin" type="date" label="Fecha Fin" fgroup-class="col-md-6" required />
            </div>

            <x-adminlte-textarea name="descripcion" label="Descripción" rows="3" placeholder="Detalle o condiciones de la promoción..." />
        </div>

        <div class="card-footer">
            <x-adminlte-button type="submit" theme="success" icon="fas fa-save" label="Guardar" />
            <a href="{{ route('promociones.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@stop
