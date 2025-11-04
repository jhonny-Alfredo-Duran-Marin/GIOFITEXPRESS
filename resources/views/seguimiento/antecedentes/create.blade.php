@extends('adminlte::page')

@section('title', 'Nuevo Antecedente')

@section('content_header')
    <h1>Registrar Antecedente Clínico</h1>
@stop

@section('content')
<div class="card card-success">
    <div class="card-header"><h3 class="card-title"><i class="fas fa-plus-circle"></i> Nuevo Antecedente</h3></div>

    <form action="{{ route('antecedentes.store') }}" method="POST">@csrf
        <div class="card-body">
            <div class="row">
                <x-adminlte-select name="cliente_id" label="Cliente" fgroup-class="col-md-6" required>
                    <option value="">-- Seleccione --</option>
                    @foreach($clientes as $c)
                        <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                    @endforeach
                </x-adminlte-select>

                <x-adminlte-select name="nutricionista_id" label="Nutricionista" fgroup-class="col-md-6" required>
                    <option value="">-- Seleccione --</option>
                    @foreach($nutricionistas as $n)
                        <option value="{{ $n->id }}">{{ $n->nombre }}</option>
                    @endforeach
                </x-adminlte-select>
            </div>

            <div class="row">
                <x-adminlte-input name="fecha" type="date" label="Fecha" fgroup-class="col-md-4" required />
                <x-adminlte-input name="fecha_prox_consulta" type="date" label="Próxima Consulta" fgroup-class="col-md-4" />
                <x-adminlte-input name="objetivo" label="Objetivo" fgroup-class="col-md-4" />
            </div>

            <div class="row">
                <x-adminlte-input name="peso" type="number" step="0.01" label="Peso (kg)" fgroup-class="col-md-3" />
                <x-adminlte-input name="altura" type="number" step="0.01" label="Altura (m)" fgroup-class="col-md-3" />
                <x-adminlte-input name="imc" type="number" step="0.01" label="IMC" fgroup-class="col-md-2" />
                <x-adminlte-input name="gc" type="number" step="0.01" label="Grasa Corporal (%)" fgroup-class="col-md-2" />
                <x-adminlte-input name="mm" type="number" step="0.01" label="Masa Muscular (kg)" fgroup-class="col-md-2" />
            </div>

            <x-adminlte-input name="diagnostico" label="Diagnóstico" />
            <x-adminlte-textarea name="recomendaciones" label="Recomendaciones" rows="3" placeholder="Detalles o consejos del nutricionista..." />
        </div>

        <div class="card-footer">
            <x-adminlte-button type="submit" theme="success" icon="fas fa-save" label="Guardar" />
            <a href="{{ route('antecedentes.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@stop
