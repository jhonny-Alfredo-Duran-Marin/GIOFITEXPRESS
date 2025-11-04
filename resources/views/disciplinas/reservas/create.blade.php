@extends('adminlte::page')

@section('title', 'Nueva Reserva')

@section('content_header')
    <h1>Registrar Reserva</h1>
@stop

@section('content')
<div class="card card-success">
    <div class="card-header"><h3 class="card-title"><i class="fas fa-plus-circle"></i> Nueva Reserva</h3></div>

    <form action="{{ route('reservas.store') }}" method="POST">@csrf
        <div class="card-body">
            <div class="row">
                <x-adminlte-select name="cliente_id" label="Cliente" fgroup-class="col-md-6" required>
                    <option value="">-- Seleccione --</option>
                    @foreach($clientes as $c)
                        <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                    @endforeach
                </x-adminlte-select>

                <x-adminlte-select name="disciplina_id" label="Disciplina" fgroup-class="col-md-6" required>
                    <option value="">-- Seleccione --</option>
                    @foreach($disciplinas as $d)
                        <option value="{{ $d->id }}">
                            {{ $d->nombre }} - {{ $d->sala->descripcion ?? 'Sin sala' }}
                            (Instructor: {{ $d->instructor->nombre ?? 'No asignado' }})
                        </option>
                    @endforeach
                </x-adminlte-select>
            </div>

            <div class="row">
                <x-adminlte-input name="fecha" type="date" label="Fecha de Reserva" fgroup-class="col-md-6" required />
                <x-adminlte-select name="estado" label="Estado" fgroup-class="col-md-6" required>
                    <option value="Activo">Activo</option>
                    <option value="Pasivo">Pasivo</option>
                </x-adminlte-select>
            </div>
        </div>

        <div class="card-footer">
            <x-adminlte-button type="submit" theme="success" icon="fas fa-save" label="Guardar" />
            <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@stop
