@extends('adminlte::page')

@section('title', 'Antecedentes Clínicos')

@section('content_header')
    <h1>Gestión de Antecedentes Clínicos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between">
        <span>Listado de Antecedentes</span>
        <a href="{{ route('antecedentes.create') }}" class="btn btn-light btn-sm">
            <i class="fas fa-plus"></i> Nuevo Antecedente
        </a>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Cliente</th>
                    <th>Nutricionista</th>
                    <th>Fecha</th>
                    <th>Peso (kg)</th>
                    <th>Altura (m)</th>
                    <th>IMC</th>
                    <th>Objetivo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($antecedentes as $a)
                <tr>
                    <td>{{ $a->cliente->nombre }}</td>
                    <td>{{ $a->nutricionista->nombre }}</td>
                    <td>{{ $a->fecha }}</td>
                    <td>{{ $a->peso }}</td>
                    <td>{{ $a->altura }}</td>
                    <td>{{ $a->imc }}</td>
                    <td>{{ $a->objetivo ?? '—' }}</td>
                    <td>
                        <a href="{{ route('antecedentes.edit', $a) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('antecedentes.destroy', $a) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar antecedente?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
