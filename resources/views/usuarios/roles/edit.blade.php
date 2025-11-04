@extends('adminlte::page')
@section('title','Editar Rol')
@section('content_header') <h1>Editar Rol</h1> @stop
@section('content')
<x-adminlte-card>
  <form method="POST" action="{{ route('roles.update',$role) }}">
    @csrf @method('PUT')
    @include('usuarios.roles.partials.form')
  </form>
</x-adminlte-card>
@stop
