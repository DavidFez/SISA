@extends('adminlte::page')

@section('title', 'Listado de Habitantes')

@section('content_header')
    <span class="badge text-bg-success"><h1>Listado de Todos los Habitantes</h1></span>
@stop

@section('content')
    @livewire('habitantes.op-listado-habitantes')
@stop

@section('css')
    
@stop

@section('js')
    <script src="{{ asset('js/habitanteJs/desactivarHabitante.js') }}"></script>
@stop