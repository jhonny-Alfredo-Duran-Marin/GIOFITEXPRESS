@extends('adminlte::page')

@section('title', 'Editar Horario')

@section('content_header')
    <h1>Editar Horario</h1>
@stop

@section('content')
<div class="card card-warning">
    <div class="card-header"><h3 class="card-title"><i class="fas fa-edit"></i> Editar Horario</h3></div>

    <form action="{{ route('horarios.update', $horario) }}" method="POST">@csrf @method('PUT')
        <div class="card-body">
            <x-adminlte-select name="disciplina_id" label="Disciplina" required>
                @foreach($disciplinas as $d)
                    <option value="{{ $d->id }}" {{ $d->id == $horario->disciplina_id ? 'selected' : '' }}>
                        {{ $d->nombre }}
                    </option>
                @endforeach
            </x-adminlte-select>

            <x-adminlte-input name="dia" label="Día" value="{{ $horario->dia }}" required />
            <div class="row">
                <x-adminlte-input name="hora_ini" type="time" label="Hora de Inicio"
                    value="{{ $horario->hora_ini }}" fgroup-class="col-md-6" required />
                <x-adminlte-input name="hora_fin" type="time" label="Hora de Fin"
                    value="{{ $horario->hora_fin }}" fgroup-class="col-md-6" required />
            </div>
        </div>

        <div class="card-footer">
            <x-adminlte-button type="submit" theme="warning" icon="fas fa-sync" label="Actualizar" />
            <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>
@stop
