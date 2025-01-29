@extends('adminlte::page')

@section('title', 'SISA-Inicio')

@section('content_header')
    <div class="bg-primary-subtle p-4 rounded shadow-sm text-center">
        <h1 class="display-4 text-primary font-weight-bold">SISA</h1>
        <hr class="w-50 mx-auto border-primary">
        <h5 class="text-muted">Sistema de Control Poblacional Adonay</h5>
    </div>
@stop


@section('content')
    @livewire('index')
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop