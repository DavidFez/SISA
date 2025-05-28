@extends('adminlte::page')

@section('title', 'Listado de Habitantes')

@section('content_header')
    <h1><span class="badge text-bg-secondary">HABITANTES ACTIVOS</span></h1>
@stop

@section('content')
    @livewire('habitantes.op-listado-habitantes')
@stop

@section('css')
    
@stop

@section('js')
    <script src="{{ asset('js/habitanteJs/desactivarHabitante.js') }}"></script>
@stop