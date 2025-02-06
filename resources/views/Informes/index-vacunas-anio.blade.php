@extends('adminlte::page')

@section('title', 'Listado Vacunas')

@section('content_header')
    <h1>Listado de vacunas por año</h1>
@stop

@section('content')
    @livewire('vacunas.listado-vacunas-anio')
@stop

@section('css')
    
@stop

@section('js')

@stop