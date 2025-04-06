@extends('adminlte::page')

@section('title', 'Habitantes No Activos')

@section('content_header')
    <h1><span class="badge text-bg-secondary">HABITANTES NO ACTIVOS</span></h1>
@stop

@section('content')
    @livewire('habitantes.op-habitantes-no-activos')
@stop

@section('css')
    
@stop

@section('js')
<script src="{{ asset('js/habitanteJs/activarHabitante.js') }}"></script>
@stop