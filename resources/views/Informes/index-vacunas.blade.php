@extends('adminlte::page')

@section('title', 'Listado Vacunas')

@section('content_header')
    <h1>Listado de vacunas por edades</h1>
@stop

@section('content')
    @livewire('vacunas.listado-vacunas')
@stop

@section('css')
    
@stop

@section('js')

@stop