@extends('adminlte::page')

@section('title', 'Editar Antecedente')

@section('content_header')
    <h1>Editar Antecedente Clínico</h1>
@stop

@section('content')
<div class="card card-warning">
    <div class="card-header"><h3 class="card-title"><i class="fas fa-edit"></i> Editar Antecedente</h3></div>

    <form action="{{ route('antecedentes.update', $antecedente) }}" method="POST">@csrf @method('PUT')
        <div class="card-body">
            <div class="row">
                <x-adminlte-select name="cliente_id" label="Cliente" fgroup-class="col-md-6" required>
                    @foreach($clientes as $c)
                        <option value="{{ $c->id }}" {{ $c->id == $antecedente->cliente_id ? 'selected' : '' }}>
                            {{ $c->nombre }}
                        </option>
                    @endforeach
                </x-adminlte-select>

                <x-adminlte-select name="nutricionista_id" label="Nutricionista" fgroup-class="col-md-6" required>
                    @foreach($nutricionistas as $n)
                        <option value="{{ $n->id }}" {{ $n->id == $antecedente->nutricionista_id ? 'selected' : '' }}>
                            {{ $n->nombre }}
                        </option>
                    @endforeach
                </x-adminlte-select>
            </div>

            <div class="row">
                <x-adminlte-input name="fecha" type="date" label="Fecha" value="{{ $antecedente->fecha }}" fgroup-class="col-md-4" required />
                <x-adminlte-input name="fecha_prox_consulta" type="date" label="Próxima Consulta"
                    value="{{ $antecedente->fecha_prox_consulta }}" fgroup-class="col-md-4" />
                <x-adminlte-input name="objetivo" label="Objetivo" value="{{ $antecedente->objetivo }}" fgroup-class="col-md-4" />
            </div>

            <div class="row">
                <x-adminlte-input name="peso" type="number" step="0.01" label="Peso (kg)" value="{{ $antecedente->peso }}" fgroup-class="col-md-3" />
                <x-adminlte-input name="altura" type="number" step="0.01" label="Altura (m)" value="{{ $antecedente->altura }}" fgroup-class="col-md-3" />
                <x-adminlte-input name="imc" type="number" step="0.01" label="IMC" value="{{ $antecedente->imc }}" fgroup-class="col-md-2" />
                <x-adminlte-input name="gc" type="number" step="0.01" label="Grasa Corporal (%)" value="{{ $antecedente->gc }}" fgroup-class="col-md-2" />
                <x-adminlte-input name="mm" type="number" step="0.01" label="Masa Muscular (kg)" value="{{ $antecedente->mm }}" fgroup-class="col-md-2" />
            </div>

            <x-adminlte-input name="diagnostico" label="Diagnóstico" value="{{ $antecedente->diagnostico }}" />
            <x-adminlte-textarea name="recomendaciones" label="Recomendaciones" rows="3">{{ $antecedente->recomendaciones }}</x-adminlte-textarea>
        </div>

        <div class="card-footer">
            <x-adminlte-button type="submit" theme="warning" icon="fas fa-sync" label="Actualizar" />
            <a href="{{ route('antecedentes.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>
@stop
