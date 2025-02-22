@extends('adminlte::page')

@section('title', 'Habitantes No Activos')

@section('content_header')
    <span class="badge text-bg-success"><h1>Listado de Habitantes No Activos</h1></span>
@stop

@section('content')
    @livewire('habitantes.op-habitantes-no-activos')
@stop

@section('css')
    
@stop

@section('js')
<script src="{{ asset('js/habitanteJs/activarHabitante.js') }}"></script>
@stop