@extends('adminlte::page')
@section('title','Crear Rol')
@section('content_header') <h1>Crear Rol</h1> @stop
@section('content')
<x-adminlte-card>
  <form method="POST" action="{{ route('roles.store') }}">
    @csrf
    @include('usuarios.roles.partials.form', ['role'=>null,'selected'=>[]])
  </form>
</x-adminlte-card>
@stop
