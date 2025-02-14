@extends('adminlte::page')

@section('title', 'Habitantes')

@section('content_header')
    <h1>Gestion de Habitantes</h1>
@stop

@section('content')
    @livewire('habitantes.listado-habitantes')
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop