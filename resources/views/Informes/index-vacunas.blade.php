@extends('adminlte::page')

@section('title', 'Listado Vacunas')

@section('content_header')
    <h1><span class="badge text-bg-success">VACUNAS</span></h1>
@stop

@section('content')
    @livewire('vacunas.listado-vacunas')
@stop

@section('css')
    
@stop

@section('js')

@stop