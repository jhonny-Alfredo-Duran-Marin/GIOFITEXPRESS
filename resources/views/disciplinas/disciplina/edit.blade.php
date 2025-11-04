@extends('adminlte::page')

@section('title', 'Editar Disciplina')

@section('content_header')
    <h1>Editar Disciplina</h1>
@stop

@section('content')
<div class="card card-warning">
    <div class="card-header"><h3 class="card-title"><i class="fas fa-edit"></i> Editar</h3></div>

    <form action="{{ route('disciplinas.update', $disciplina) }}" method="POST">@csrf @method('PUT')
        <div class="card-body">
            <x-adminlte-input name="nombre" label="Nombre" value="{{ $disciplina->nombre }}" required />
            <x-adminlte-input name="grupo" label="Grupo" value="{{ $disciplina->grupo }}" required />
            <x-adminlte-input name="cupo" type="number" label="Cupo" value="{{ $disciplina->cupo }}" required />

            <x-adminlte-select name="sala_id" label="Sala" required>
                @foreach($salas as $s)
                    <option value="{{ $s->id }}" {{ $s->id == $disciplina->sala_id ? 'selected' : '' }}>
                        {{ $s->descripcion }}
                    </option>
                @endforeach
            </x-adminlte-select>

              <x-adminlte-select name="instructor_id" label="Instructor" required>
                @foreach($instructor as $s)
                    <option value="{{ $s->id }}" {{ $s->id == $disciplina->instructor_id ? 'selected' : '' }}>
                        {{ $s->nombre }}
                    </option>
                @endforeach
            </x-adminlte-select>
        </div>

        <div class="card-footer">
            <x-adminlte-button type="submit" theme="warning" icon="fas fa-sync" label="Actualizar" />
            <a href="{{ route('disciplinas.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>
@stop
