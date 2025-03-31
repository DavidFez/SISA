@extends('adminlte::page')

@section('title', 'Familias')

@section('content_header')
    <h1><span class="badge text-bg-success">FAMILIAS</span></h1>
@stop

@section('content')
    @livewire('familias.listado-familias')
@stop

@section('css')
    
@stop

@section('js')
    
@stop