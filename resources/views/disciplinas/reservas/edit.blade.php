@extends('adminlte::page')

@section('title', 'Editar Reserva')

@section('content_header')
    <h1>Editar Reserva</h1>
@stop

@section('content')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-edit"></i> Editar Reserva #{{ $reserva->id }}</h3>
    </div>

    <form action="{{ route('reservas.update', $reserva) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">

            {{-- Cliente --}}
            <div class="row">
                <x-adminlte-select name="cliente_id" label="Cliente" fgroup-class="col-md-6" required>
                    @foreach($clientes as $c)
                        <option value="{{ $c->id }}" {{ $c->id == $reserva->cliente_id ? 'selected' : '' }}>
                            {{ $c->nombre }}
                        </option>
                    @endforeach
                </x-adminlte-select>

                {{-- Disciplina --}}
                <x-adminlte-select name="disciplina_id" label="Disciplina" fgroup-class="col-md-6" required>
                    @foreach($disciplinas as $d)
                        <option value="{{ $d->id }}" {{ $d->id == $reserva->disciplina_id ? 'selected' : '' }}>
                            {{ $d->nombre }} - {{ $d->sala->descripcion ?? 'Sin sala' }}
                            (Instructor: {{ $d->instructor->nombre ?? 'No asignado' }})
                        </option>
                    @endforeach
                </x-adminlte-select>
            </div>

            {{-- Info automática de la disciplina --}}
            @php
                $disciplina = $reserva->disciplina;
            @endphp

            @if($disciplina)
            <div class="row mt-3">
                <div class="col-md-4">
                    <x-adminlte-input name="sala" label="Sala" value="{{ $disciplina->sala->descripcion ?? 'Sin sala asignada' }}" readonly />
                </div>
                <div class="col-md-4">
                    <x-adminlte-input name="instructor" label="Instructor" value="{{ $disciplina->instructor->nombre ?? 'No asignado' }}" readonly />
                </div>
                <div class="col-md-4">
                    <label>Horarios Disponibles</label>
                    @if($disciplina->horarios->count())
                        <ul class="list-group">
                            @foreach($disciplina->horarios as $h)
                                <li class="list-group-item py-1">{{ $h->dia }}: {{ $h->hora_ini }} - {{ $h->hora_fin }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">No hay horarios registrados</p>
                    @endif
                </div>
            </div>
            @endif

            {{-- Fecha y Estado --}}
            <div class="row mt-4">
                <x-adminlte-input name="fecha" type="date" label="Fecha de Reserva" value="{{ $reserva->fecha }}" fgroup-class="col-md-6" required />
                <x-adminlte-select name="estado" label="Estado" fgroup-class="col-md-6" required>
                    <option value="Activo" {{ $reserva->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Pasivo" {{ $reserva->estado == 'Pasivo' ? 'selected' : '' }}>Pasivo</option>
                </x-adminlte-select>
            </div>
        </div>

        <div class="card-footer">
            <x-adminlte-button type="submit" theme="warning" icon="fas fa-sync" label="Actualizar" />
            <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>
@stop
