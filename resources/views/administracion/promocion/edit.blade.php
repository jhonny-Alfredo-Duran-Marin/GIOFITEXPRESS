@extends('adminlte::page')

@section('title', 'Editar Promoción')

@section('content_header')
    <h1>Editar Promoción</h1>
@stop

@section('content')
<div class="card card-warning">
    <div class="card-header"><h3 class="card-title"><i class="fas fa-edit"></i> Editar Promoción</h3></div>

    <form action="{{ route('promociones.update', $promocion) }}" method="POST">@csrf @method('PUT')
        <div class="card-body">
            <x-adminlte-input name="nombre" label="Nombre de Promoción" value="{{ $promocion->nombre }}" required />

            <div class="row">
                <x-adminlte-select name="tipo" label="Tipo" fgroup-class="col-md-4" required>
                    <option value="Porcentaje" {{ $promocion->tipo == 'Porcentaje' ? 'selected' : '' }}>Porcentaje</option>
                    <option value="Monto Fijo" {{ $promocion->tipo == 'Monto Fijo' ? 'selected' : '' }}>Monto Fijo</option>
                </x-adminlte-select>

                <x-adminlte-input name="valor" type="number" step="0.01" min="0" label="Valor"
                    fgroup-class="col-md-4" value="{{ $promocion->valor }}" required />

                <x-adminlte-select name="estado" label="Estado" fgroup-class="col-md-4" required>
                    <option value="Activo" {{ $promocion->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Inactivo" {{ $promocion->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                </x-adminlte-select>
            </div>

            <div class="row">
                <x-adminlte-input name="fecha_ini" type="date" label="Fecha Inicio" fgroup-class="col-md-6"
                    value="{{ $promocion->fecha_ini->format('Y-m-d') }}" required />
                <x-adminlte-input name="fecha_fin" type="date" label="Fecha Fin" fgroup-class="col-md-6"
                    value="{{ $promocion->fecha_fin->format('Y-m-d') }}" required />
            </div>

            <x-adminlte-textarea name="descripcion" label="Descripción" rows="3">{{ $promocion->descripcion }}</x-adminlte-textarea>
        </div>

        <div class="card-footer">
            <x-adminlte-button type="submit" theme="warning" icon="fas fa-sync" label="Actualizar" />
            <a href="{{ route('promociones.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>
@stop
