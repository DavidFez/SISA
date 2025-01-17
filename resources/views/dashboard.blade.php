@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>SISA</h1>
@stop

@section('content')
    <p>Sistama de control de población.</p>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop