@extends('adminlte::page')

@section('title', 'Editar Persona')

@section('content_header')
    <h1><i class="fas fa-user-edit"></i> Editar Persona</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('personas.update', $persona->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Nombre</label>
                    <input type="text" name="nombre" value="{{ $persona->nombre }}" class="form-control" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Teléfono</label>
                    <input type="text" name="telefono" value="{{ $persona->telefono }}" class="form-control" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Sexo</label>
                    <select name="sexo" class="form-control">
                        <option value="M" @selected($persona->sexo == 'M')>Masculino</option>
                        <option value="F" @selected($persona->sexo == 'F')>Femenino</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Nacimiento</label>
                    <input type="date" name="nacimiento" value="{{ $persona->nacimiento }}" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Tipo</label>
                    <select name="tipo" class="form-control">
                        @foreach(['ADMINISTRATIVO','NUTRICIONISTA','INSTRUCTOR','CLIENTE'] as $tipo)
                            <option value="{{ $tipo }}" @selected($persona->tipo == $tipo)>{{ $tipo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label>CI</label>
                    <input type="text" name="ci" value="{{ $persona->ci }}" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Especialidad</label>
                    <input type="text" name="especialidad" value="{{ $persona->especialidad }}" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Cargo</label>
                    <input type="text" name="cargo" value="{{ $persona->cargo }}" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Turno</label>
                    <select name="turno" class="form-control">
                        <option value="">—</option>
                        <option value="MAÑANA" @selected($persona->turno == 'MAÑANA')>Mañana</option>
                        <option value="TARDE" @selected($persona->turno == 'TARDE')>Tarde</option>
                        <option value="NOCHE" @selected($persona->turno == 'NOCHE')>Noche</option>
                    </select>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('personas.index') }}" class="btn btn-secondary">Volver</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
</div>
@stop
