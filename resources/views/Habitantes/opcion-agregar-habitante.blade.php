@extends('adminlte::page')

@section('title', 'Nuevo Habitante')

@section('content_header')
    <h1><span class="badge text-bg-secondary">NUEVO HABITANTE</span></h1>
@stop

@section('content')
    @livewire('habitantes.nuevo-habitante')
@stop

@section('css')
    
@stop

@section('js')
    <script src="{{ asset('js/habitanteJs/nuevoHabitante.js') }}"></script>
@stop