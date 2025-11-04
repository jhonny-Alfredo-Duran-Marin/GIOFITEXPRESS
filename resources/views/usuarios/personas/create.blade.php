@extends('adminlte::page')

@section('title', 'Nueva Persona')

@section('content_header')
    <h1><i class="fas fa-user-plus"></i> Registrar Nueva Persona</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('personas.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Teléfono</label>
                    <input type="text" name="telefono" class="form-control" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Sexo</label>
                    <select name="sexo" class="form-control" required>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Fecha de nacimiento</label>
                    <input type="date" name="nacimiento" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Tipo</label>
                    <select name="tipo" class="form-control" required>
                        <option value="ADMINISTRATIVO">Administrativo</option>
                        <option value="NUTRICIONISTA">Nutricionista</option>
                        <option value="INSTRUCTOR">Instructor</option>
                        <option value="CLIENTE">Cliente</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label>CI</label>
                    <input type="text" name="ci" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Especialidad</label>
                    <input type="text" name="especialidad" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Cargo</label>
                    <input type="text" name="cargo" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Turno</label>
                    <select name="turno" class="form-control">
                        <option value="">—</option>
                        <option value="MAÑANA">Mañana</option>
                        <option value="TARDE">Tarde</option>
                        <option value="NOCHE">Noche</option>
                    </select>
                </div>
            </div>

            <hr>
            <h5><i class="fas fa-user-lock"></i> Datos de cuenta</h5>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Contraseña</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('personas.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
</div>
@stop
