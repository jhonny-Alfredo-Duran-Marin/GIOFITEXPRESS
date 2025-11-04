@extends('adminlte::page')

@section('title', 'Nueva Disciplina')

@section('content_header')
    <h1>Registrar Disciplina</h1>
@stop

@section('content')
<div class="card card-success">
    <div class="card-header"><h3 class="card-title"><i class="fas fa-plus-circle"></i> Nueva Disciplina</h3></div>

    <form action="{{ route('disciplinas.store') }}" method="POST">@csrf
        <div class="card-body">
            <x-adminlte-input name="nombre" label="Nombre" placeholder="Ej. CrossFit, Yoga" required />
            <x-adminlte-input name="grupo" label="Grupo" placeholder="Ej. A, B o C" required />
            <x-adminlte-input name="cupo" type="number" label="Cupo Máximo" min="1" required />

            <x-adminlte-select name="sala_id" label="Sala" required>
                <option value="">-- Selecciona una sala --</option>
                @foreach($salas as $s)
                    <option value="{{ $s->id }}">{{ $s->descripcion }}</option>
                @endforeach
            </x-adminlte-select>
              <x-adminlte-select name="instructor_id" label="Instructor" required>
                <option value="">-- Selecciona una Instructor --</option>
                @foreach($instructor as $s)
                    <option value="{{ $s->id }}">{{ $s->nombre }}</option>
                @endforeach
            </x-adminlte-select>
        </div>

        <div class="card-footer">
            <x-adminlte-button type="submit" theme="success" icon="fas fa-save" label="Guardar" />
            <a href="{{ route('disciplinas.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@stop
