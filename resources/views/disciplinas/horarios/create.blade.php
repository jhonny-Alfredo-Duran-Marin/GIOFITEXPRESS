@extends('adminlte::page')

@section('title', 'Nuevo Horario')

@section('content_header')
    <h1>Registrar Nuevo Horario</h1>
@stop

@section('content')
<div class="card card-success">
    <div class="card-header"><h3 class="card-title"><i class="fas fa-plus-circle"></i> Nuevo Horario</h3></div>

    <form action="{{ route('horarios.store') }}" method="POST">@csrf
        <div class="card-body">
            <x-adminlte-select name="disciplina_id" label="Disciplina" required>
                <option value="">-- Seleccione Disciplina --</option>
                @foreach($disciplinas as $d)
                    <option value="{{ $d->id }}">{{ $d->nombre }}</option>
                @endforeach
            </x-adminlte-select>

            <x-adminlte-input name="dia" label="Día" placeholder="Ej. Lunes, Martes..." required />
            <div class="row">
                <x-adminlte-input name="hora_ini" type="time" label="Hora de Inicio" fgroup-class="col-md-6" required />
                <x-adminlte-input name="hora_fin" type="time" label="Hora de Fin" fgroup-class="col-md-6" required />
            </div>
        </div>

        <div class="card-footer">
            <x-adminlte-button type="submit" theme="success" icon="fas fa-save" label="Guardar" />
            <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@stop
